<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\userSocialDetails;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use GuzzleHttp\Client;

class socialLoginController extends Controller
{
    public function index($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function store($provider)
    {
        $userSocial       =   Socialite::driver($provider)->stateless()->user();
        $user       =   User::where(['email' => $userSocial->getEmail()])->first();

        DB::beginTransaction();
        try {
            if ($user) {
                $socialDetails = userSocialDetails::where(['user_id' => $user->id, 'provider' => $provider, 'provider_id' => $userSocial->getId()])->first();
                if (empty($socialDetails)) {
                    $userSocialDetails  = new userSocialDetails();
                    $userSocialDetails->user_id = $user->id;
                    $userSocialDetails->provider_id = $userSocial->getId();
                    $userSocialDetails->provider = $provider;
                    $userSocialDetails->token =  $userSocial->token;
                    $userSocialDetails->save();
                }
            } else {

                $user                = new User();
                $user->name          = $userSocial->getName();
                $user->nickname      = generateNickname($userSocial->getName());
                $user->password      = Hash::make(123456);
                $user->email         = $userSocial->getEmail();
                $user->image         = $userSocial->getAvatar();
                $user->back_image    = config('user.user.back_image');
                $user->save();
                if ($user) {
                    $userSocialDetails  = new userSocialDetails();
                    $userSocialDetails->user_id = $user->id;
                    $userSocialDetails->provider_id = $userSocial->getId();
                    $userSocialDetails->provider = $provider;
                    $userSocialDetails->token =  $userSocial->token;
                    $userSocialDetails->save();
                }
            }

            DB::commit();
            Auth::login($user);
            User::where('id', Auth::id())->update(['loginType' => 2]);

            return redirect()->route('profile');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }


    public function redirectToInstagram()
    {
        $clientId = config('services.instagram.client_id');
        $redirectUri = urlencode(config('services.instagram.redirect'));

        $url = "https://api.instagram.com/oauth/authorize?client_id={$clientId}&redirect_uri={$redirectUri}&scope=user_profile,user_media&response_type=code";

        return redirect()->away($url);
    }

    public function handleInstagramCallback(Request $request)
    {
        $code = $request->input('code');

        $clientId =  config('services.instagram.client_id');
        $clientSecret = config('services.instagram.client_secret');
        $redirectUri = config('services.instagram.redirect');

        $client = new Client();

        $response = $client->post('https://api.instagram.com/oauth/access_token', [
            'form_params' => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'grant_type' => 'authorization_code',
                'redirect_uri' => $redirectUri,
                'code' => $code,
            ],
        ]);

        $data = json_decode((string) $response->getBody(), true);

        $accessToken = $data['access_token'];

        // Example using Guzzle HTTP client to fetch profile information
        $client = new Client();
        $response = $client->get('https://graph.instagram.com/me', [
            'query' => [
                'fields' => 'id,username,profile_picture_url',
                'access_token' => $accessToken,
            ],
        ]);

        $profileData = json_decode($response->getBody(), true);

        $name = str_replace(' ', '_', $profileData['username']);

        $user                = new User();
        $user->name          = $name;
        $user->nickname      = generateNickname($name);
        $user->password      = Hash::make(123456);
        $user->image         = config('user.user.image');
        $user->back_image    = config('user.user.back_image');
        $user->save();
        if ($user) {
            $userSocialDetails  = new userSocialDetails();
            $userSocialDetails->user_id = $user->id;
            $userSocialDetails->provider_id = $profileData['id'];
            $userSocialDetails->provider = 'instagram';
            $userSocialDetails->token =  $accessToken;
            $userSocialDetails->save();
        }

        Auth::login($user);
        User::where('id', Auth::id())->update(['loginType' => 2]);

        return redirect()->route('profile');
    }
}
