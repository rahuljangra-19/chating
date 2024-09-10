<?php

namespace App\Http\Controllers;

use App\Models\callLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Twilio\Jwt\AccessToken;
use Twilio\Rest\Client;
use Twilio\Jwt\Grants\VideoGrant;

class VideoCallController extends Controller
{
    private $accountSid, $apiKeySid, $apiKeySecret, $apiToken;

    public function __construct()
    {
        $this->accountSid = env('TWILIO_ACCOUNT_SID');
        $this->apiKeySid = env('TWILIO_API_KEY');
        $this->apiKeySecret = env('TWILIO_API_SECRET');
        $this->apiToken = env('TWILIO_AUTH_TOKEN');
    }

    public function generateToken(Request $request)
    {
        // Substitute your Twilio Account SID and API Key details


        $identity = $request->username;
        $room = $request->roomName;

        // Create an Access Token
        $token = new AccessToken(
            $this->accountSid,
            $this->apiKeySid,
            $this->apiKeySecret,
            3600,
            $identity
        );

        // Grant access to Video
        $grant = new VideoGrant();
        $grant->setRoom($room);
        $token->addGrant($grant);

        // Serialize the token as a JWT
        echo $token->toJWT();
    }

    public function index()
    {
        // return view('video-call');
        return view('video');
    }


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

    #------ SAVE DETAILS CALL LOGS -----#
    public function saveCallLogs(Request $request)
    {
        if ($request->id) {
            $callLog =  callLogs::find($request->id);
            $roomDetails =  $this->fetchCallLog($callLog->uniqueName);
            $callLog->sid   = $roomDetails->sid;
            $callLog->start_time = $roomDetails->dateCreated;
            $callLog->end_time = $roomDetails->endTime;
            $callLog->status = $roomDetails->status;
            $callLog->duration = $request->duration;
            $callLog->save();
        }

        $valid = Validator::make($request->all(), [
            'fromUser' => ['required'],
            'roomName' => ['required'],
            'threadId' => ['required', 'exists:threads,id'],
            'toUser' => ['required'],
        ]);

        if (!$valid->fails()) {
            $callLog = new callLogs();
            $callLog->from_user = $request->fromUser;
            $callLog->to_user = $request->toUser;
            $callLog->uniqueName = $request->roomName;
            $callLog->thread_id = $request->threadId;
            $callLog->by_userId = Auth::id();
            $callLog->to_userId = $request->toUserId;
            $callLog->thread_id = $request->threadId;
            $callLog->type = $request->callType;
            $callLog->save();

            return response()->json(['data' => $callLog]);
        }
    }
    private function fetchCallLog($roomName)
    {
        $twilio = new Client($this->accountSid, $this->apiToken);

        // API request to fetch call logs
        $room = $twilio->video->v1->rooms->read([
            "status" => "completed",
            "uniqueName" => $roomName
        ]);

        foreach ($room as $call) {
            return $call;
        }
    }

    public function fetchCallLogs()
    {

        $twilio = new Client($this->accountSid, $this->apiToken);

        // API request to fetch call logs
        $rooms = $twilio->video->v1->rooms->read(["status" => "completed"]);
        dd($rooms);
        // foreach ($callLogs as $call) {
        //     // Save each call log to the database
        //     $callLog = new CallLog();
        //     $callLog->sid = $call->sid;
        //     $callLog->account_sid = $call->accountSid;
        //     $callLog->from = $call->from;
        //     $callLog->to = $call->to;
        //     $callLog->duration = $call->duration;
        //     $callLog->status = $call->status;
        //     $callLog->start_time = $call->startTime->format('Y-m-d H:i:s');
        //     $callLog->end_time = $call->endTime ? $call->endTime->format('Y-m-d H:i:s') : null;
        //     $callLog->save();
        // }

        // return response()->json(['message' => 'Call logs fetched and saved successfully']);
    }
}
