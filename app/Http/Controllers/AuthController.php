<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ImageTrait;
    #---- load Login page ---#
    public function index()
    {
        return view('auth.login');
    }

    #---- load logout page ---#
    public function logout()
    {
        Auth::logout();
        return view('auth.logout');
    }

    #----- Update user socket ID -----#
    public function updateSocketId(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'token' => ['required']
        ]);
        if (!$valid->fails()) {
            auth()->user()->update(['socket_id' => $request->token]);
            return response()->json(['token saved successfully.']);
        }
    }
    #--- Profile ---#
    public function profile(Request $request)
    {
        if ($request->user()->can('view', User::class)) {
            return view('pages.profile');
        }

        return redirect()->route('dashboard');
    }

    #--- Update Profile ---#
    public function updateProfile(Request $request)
    {
        try {
            $user = User::find(Auth::id());
            if ($request->type) {
                if ($request->type == 'profile') {
                    $user->image =    $this->resizeImage($request->file('file'));
                }
                if ($request->type == 'foreground') {
                    $user->back_image =    $this->resizeImage($request->file('file'));
                }
            }
            if ($request->name) {
                $user->name = $request->name;
                $user->nickname = generateNickname($request->username);
            }
            if ($request->location) {
                $user->location = $request->location;
            }
            if ($request->phone) {
                $user->phone = $request->phone;
            }

            $user->save();

            return response()->json(['status' => 200, 'message' => 'Profile updated']);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }
}
