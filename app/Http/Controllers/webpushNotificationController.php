<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\NullableType;

class webpushNotificationController extends Controller
{
    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token' => $request->token]);
        return response()->json(['token saved successfully.']);
    }


    // public function sendPushNotification(Request $request)
    // {
    //     $credentialsFilePath =  base_path() . '/fcm.json';

    //     $client = new \Google_Client();
    //     $client->setAuthConfig($credentialsFilePath);
    //     $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
    //     $apiurl = 'https://fcm.googleapis.com/v1/projects/chat-notify-a21be/messages:send';
    //     $client->refreshTokenWithAssertion();
    //     $token = $client->getAccessToken();
    //     $access_token = $token['access_token'];

    //     $headers = [
    //         "Authorization: Bearer $access_token",
    //         'Content-Type: application/json'
    //     ];
    //     // Decode JSON data into PHP associative array
    //     $data = $request->input();
    //     $data = $data['data'];

    //     // Accessing values
    //     $receiver_id = $data['message']['receiver_id'];
    //     $sender_id = $data['message']['sender_id'];
    //     $message = $data['message']['message'];
    //     $message_type = $data['message']['message_type'];

    //     if ($message && $receiver_id) {

    //         $sender  =  User::where('id', $sender_id)->first();
    //         $receiver  =  User::where('id', $receiver_id)->whereNotNull('device_token')->first();

    //         if ($receiver->device_token) {

    //             if ($message_type == 1) {
    //                 $title =   ' message you';
    //             } else if ($message_type == 2) {
    //                 $title =   ' send you media';
    //             } else if ($message_type == 3) {
    //                 $title =   ' message you';
    //             } else {
    //                 $title =   ' message you';
    //             }

    //             $data = [
    //                 "data" => [
    //                     "title" => $sender->name . $title,
    //                     "body" => $message,
    //                     "url" => 'http://127.0.0.1:8000/dashboard'
    //                 ],
    //                 "token" => $receiver->device_token
    //             ];
    //             $payload = [
    //                 "message" => $data
    //             ];
    //             $payload = json_encode($payload);
    //             $ch = curl_init();
    //             curl_setopt($ch, CURLOPT_URL, $apiurl);
    //             curl_setopt($ch, CURLOPT_POST, true);
    //             curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //             curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    //             $response = curl_exec($ch);
    //             $res = curl_close($ch);
    //             // print_r($response);
    //             return true;
    //         }
    //     }
    // }


    public function sendPushNotification(Request $request)
    {
        $data = $request->input('data');

        $thread_id = $data['message']['thread_id'];

        $receiver_id = $data['message']['receiver_id'];
        $senderId = $data['message']['sender_id'];
        $message = $data['message']['message'];
        $messageType = $data['message']['message_type'];

        $thread = Thread::find($thread_id);
        if (!$thread->isUserMuted($receiver_id)) {
            if ($message && $receiver_id) {

                $sender = User::where('id', $senderId)->first();
                $receiver  =  User::where('id', $receiver_id)->whereNotNull('device_token')->first();
                if ($receiver) {
                    $deviceToken = $receiver->device_token;
                    if (!empty($deviceToken)) {
                     return   $this->sendToDeviceTokens($deviceToken, $sender->name, $message, $messageType);
                    }
                }
            }
        }
        return false;
    }

    public function sendToDeviceTokens($deviceToken, string $senderName, $message = '', int $messageType)
    {
        $credentialsFilePath = base_path() . '/fcm.json';
        $client = new \Google_Client();
        $client->setAuthConfig($credentialsFilePath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
        $apiUrl = 'https://fcm.googleapis.com/v1/projects/chat-notify-a21be/messages:send';
        $client->refreshTokenWithAssertion();
        $token = $client->getAccessToken();
        $accessToken = $token['access_token'];

        $headers = [
            "Authorization: Bearer $accessToken",
            'Content-Type: application/json'
        ];

        $title = $this->getTitleByMessageType($messageType);

        $data = [
            "data" => [
                "title" => $senderName . $title,
                "body" => $message,
                "url" => 'http://127.0.0.1:8000/dashboard'
            ],
            "token" => $deviceToken
        ];

        $payload = [
            "message" => $data
        ];

        $payload = json_encode($payload);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $response = curl_exec($ch);
        curl_close($ch);
        return true;
        // Handle the response as needed
    }

    private function getTitleByMessageType(int $messageType): string
    {
        switch ($messageType) {
            case 1:
                return ' message you';
            case 2:
                return ' send you media';
            case 3:
                return ' message you';
            default:
                return ' message you';
        }
    }
}
