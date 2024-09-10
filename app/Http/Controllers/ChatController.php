<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use App\Models\messageMedia;
use App\Models\MessageReaction;
use App\Models\Thread;
use App\Models\User;
use App\Traits\ImageTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

use function PHPSTORM_META\type;

class ChatController extends Controller
{
    use ImageTrait;
    #------ GET USERS ----#
    public function getUsers(Request $request)
    {
        $users = $this->users();
        $data = $this->getThreadUsers();

        #----- add a type for web or app request ----#
        // $data['chats'] = view::make('components.chat-users', ['threads' => $threads])->render();
        // $data['contacts'] = view::make('components.contact-users', ['users' => $users])->render();  

        return response()->json(['status' => 200, 'message' => 'users data', 'data'  => $data], 200);
    }

    #--- Get Users list for contacts ----#
    public function getContacts(Request $request)
    {
        $users = User::where('id', '!=', Auth::id());
        $users->when($request->key, function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->key . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->key . '%');
            });
        });
        $users = $users->get();
        return response()->json(['status' => 200, 'message' => 'cotacts data', 'data'  => $users], 200);
    }

    #--- Get Unread messages count ----#
    public function getUnreadMessagesCount()
    {
        $unreadMessages = Message::where('is_read', 0)->where('receiver_id', Auth::id())->count();
        return response()->json(['status' => 200, 'message' => 'unread messages count data', 'data'  => $unreadMessages], 200);
    }

    #----- get all users excep current user ----#
    public function users()
    {
        $threadUsersIds = $this->getThreadUsersId();
        return User::whereNotIn('id', $threadUsersIds)->where('id', '!=', Auth::id())->get();
    }

    #----- get all thread users ----#
    public function getThreadUsers()
    {
        $userId = Auth::id();

        return Thread::notDeletedByUser($userId)->select('threads.id', 'threads.file_type', 'threads.file', 'threads.token', 'threads.last_message', 'threads.created_at', 'threads.message_type', 'users.name', 'users.image', 'users.chat_status', 'users.nickname')
            ->selectRaw('DATE_FORMAT(threads.updated_at, "%h:%i %p") as updated_time')
            ->addSelect(DB::raw('(CASE WHEN threads.sender_id = ' . $userId . ' THEN threads.receiver_id ELSE threads.sender_id END) as user_id'))
            ->addSelect(DB::raw('COUNT(CASE WHEN messages.is_read = 0 AND messages.sender_id != ' . $userId . ' THEN 1 END) AS unread_messages'))
            ->where(function ($query) use ($userId) {
                $query->where('threads.sender_id', $userId)
                    ->orWhere('threads.receiver_id', $userId);
            })
            ->join('users', function ($join) use ($userId) {
                $join->on('users.id', '=', DB::raw('(CASE WHEN threads.sender_id = ' . $userId . ' THEN threads.receiver_id ELSE threads.sender_id END)'));
            })
            ->leftJoin('messages', function ($join) use ($userId) {
                $join->on('messages.thread_id', '=', 'threads.id')
                    ->where('messages.receiver_id', '=', $userId);
            })
            ->groupBy('threads.id', 'threads.token', 'threads.sender_id', 'threads.receiver_id', 'users.id', 'users.name', 'users.image', 'users.chat_status', 'users.nickname', 'threads.last_message', 'threads.created_at', 'threads.updated_at', 'threads.message_type', 'threads.file_type', 'threads.file')
            ->orderBy('threads.updated_at', 'desc')
            ->get();
    }

    public function getThreadUsersId()
    {
        $userId = Auth::id();

        return Thread::select('threads.*')
            ->addSelect(DB::raw('(CASE WHEN sender_id = ' . $userId . ' THEN receiver_id ELSE sender_id END) as user_id'))
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);
            })
            ->pluck('user_id')->toArray();
    }

    #------ Create new Thread Or Room ------#
    public function createThread(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'userId' => ['required', 'exists:users,id']
        ]);
        if ($valid->fails()) {
            return response()->json(['status' => 400, 'message' => 'User not found ', 'data' => null]);
        }

        $userId = $request->userId;

        #----- Check Thread exists or not ------#
        $threadCheck  = Thread::where('sender_id', Auth::id())->where('receiver_id', $userId)->orwhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)->where('receiver_id', Auth::id());
        })->first();

        if (empty($threadCheck)) {
            $thread = new Thread();
            $thread->sender_id = Auth::id();
            $thread->receiver_id =  $userId;
            $thread->token = random_int(111111, 999999);
            $thread->save();
            $thread->is_new = true;
            return response()->json(['status' => 200, 'message' => 'Added to chat ', 'data' => $thread]);
        }
        if ($threadCheck && $threadCheck->isDeletedForUser(Auth::id())) {
            $threadCheck->removeDeletedUser(Auth::id());
            $thread = Thread::find($threadCheck->id);
            $thread->is_new = true;
            return response()->json(['status' => 200, 'message' => 'Added to chat ', 'data' => $thread]);
        }
        $threadCheck->is_new = false;
        return response()->json(['status' => 200, 'message' => 'Added to chat ', 'data' => $threadCheck]);
    }

    public function sendMessage(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'threadId' => ['required', 'exists:threads,id'],
            'receiverId' => ['required', 'exists:users,id']
        ]);
        if ($request->file('media')) {
            $valid = Validator::make($request->all(), [
                'media.*' => ['required', 'max:2048'],
            ]);

            if ($valid->fails()) {
                return response()->json(['status' => 400, 'message' => 'File size exceeding', 'data' => null]);
            }
        }

        if ($valid->fails()) {
            return response()->json(['status' => 400, 'message' => 'Something went wrong', 'data' => null]);
        }
        try {
            if ($request->message || $request->file('media')) {

                $message_type = 1;  // text only
                $msg = $request->message;
                $message = new Message();
                $isYouTubeLink = isYouTubeLink($msg);

                if ($request->media && $request->message) {
                    $message_type = 4; //  both message and media 
                    $has_media = 1;
                }
                if ($request->media && empty($request->message)) {
                    $message_type = 2; //  only media 
                    $has_media = 1;
                }

                if ($isYouTubeLink) {
                    $message_type = 2; //  only media 
                    $has_media = 1;
                    $msg = null;
                }

                if ($request->latitude && $request->longitude) {
                    $message_type = 3; //  location 
                    $message->lat =  $request->latitude;
                    $message->long =  $request->longitude;
                }

                $message->thread_id = $request->threadId;
                $message->message = $msg;
                $message->sender_id = Auth::id();
                $message->receiver_id = $request->receiverId;
                $message->message_type =  $message_type;
                $message->has_media =  $has_media ?? 0;
                $message->save();

                if ($request->media || $isYouTubeLink) {
                    $array = [];
                    if ($request->media) {
                        foreach ($request->media as $media) {
                            $file = $this->uploadMedia($media);
                            $fileType = $media->getClientOriginalExtension();
                            $fileName = pathinfo($media->getClientOriginalName(), PATHINFO_FILENAME);
                            $fileSize = $media->getSize() / 1024 / 1024;
                            $array[] =   $this->saveMedia($message->id, $file, $fileSize, $fileType, $fileName);
                        }
                    }

                    if ($isYouTubeLink) {
                        $file = $request->message;  // if in message it's a youtube link 
                        $file = convertToYouTubeEmbedUrl($file);
                        $array[] =   $this->saveMedia($message->id, $file, $fileSize = 0, 'youtube_link', 'youtube');
                    }
                    $message->media = $array;
                }

                $message->time = Carbon::parse($message->created_at)->format('h:i a');
                $message->sender_image = Auth::user()->image;
                $message->receiver_image = User::find($request->receiverId)->image;
                $message->reaction = [];

                #--- update last message and type on thread ----#
                $thread = Thread::find($request->threadId);
                $thread->last_message = $msg;
                $thread->message_type = $message_type;
                $thread->file = $file ?? '';
                $thread->file_type = $fileType ?? '';
                $thread->save();
                return response()->json(['status' => '200', 'message' => 'message sent', 'data' => $message]);
            }
            return response()->json(['status' => '400', 'message' => 'message not sent', 'data' => null]);
        } catch (Exception $e) {
            return response()->json(['status' => '400', 'message' => 'message not sent', 'data' => null]);
        }
    }

    #------ Save Media -----#
    public function saveMedia($messageId, $file, $fileSize, $fileType, $fileName)
    {

        $messageMedia = new messageMedia();
        $messageMedia->message_id = $messageId;
        $messageMedia->file = $file;
        $messageMedia->file_type = $fileType;
        $messageMedia->file_size = $fileSize ?? 0;
        $messageMedia->file_name = $fileName ?? null;
        $messageMedia->save();
        // if ($fileType != 'youtube_link') {
        //     $messageMedia->file = url('/storage/app/') . '/' . $file;
        // }

        return $messageMedia;
    }

    #----- GET MESSAGES -----#
    public function getMessages(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'threadId' => ['required', 'exists:threads,id']
        ]);
        if ($valid->fails()) {
            return response()->json(['status' => 400, 'message' => 'thread not found ', 'data' => null]);
        }
        $messages = Message::notDeletedByUser(Auth::id())->with(['reaction', 'media'])->where('thread_id', $request->threadId)->orderBy('id', 'desc')->paginate(15)->through(function ($row) {
            $row->time = Carbon::parse($row->created_at)->format('h:i a');
            $row->sender_image =   User::find($row->sender_id)->image;
            $row->file = url('/storage/app/') . '/' . $row->file;
            // $row->receiver_image =  User::find($row->receiver_id)->image;
            return $row;
        });

        Message::where('receiver_id', Auth::id())->where('thread_id', $request->threadId)->where('is_read', 0)->update(['is_read' => 1, 'read_at' => Carbon::now()->format('Y-m-d H:i')]);
        return response()->json(['status' => 200, 'message' => 'chat messages', 'data' => $messages]);
    }

    #----- GET USERS DETAILS ----#
    public function getUserDetails($threadId)
    {
        $receiverUser =  Thread::Select('token', 'muted_by_users', DB::raw('(CASE WHEN sender_id = ' . Auth::id() . ' THEN receiver_id ELSE sender_id END) as user_id'))->where('id', $threadId)->first();
        $result = User::find($receiverUser->user_id);
        if ($receiverUser && $result) {
            $result->thread_token = $receiverUser->token;
            $result->is_user_muted = $receiverUser->isUserMuted(Auth::id());
            return response()->json(['status' => 200, 'message' => 'user Details', 'data' => $result]);
        }
    }

    #----- Update user chat status ---#
    public function updateUserChatStatus(Request $request)
    {
        $user = User::find(Auth::id());
        $user->chat_status = $request->status;
        $user->save();
        return response()->json(['status' => 200, 'message' => 'user status updated', 'data' => null]);
    }

    #----- by node js server request ---#
    public function updateUserStatus(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'socketId' => ['required'],
            'status' => ['required'],
        ]);
        if (!$valid->fails()) {
            $user = User::where('socket_id', $request->socketId)->first();
            if ($user) {
                $user->chat_status = $request->status;
                $user->save();
                return response()->json(['status' => 200, 'message' => 'user status updated', 'data' => null]);
            }
        }
        return response()->json(['status' => 200, 'message' => 'user not found', 'data' => null]);
    }

    #---- GET SOCKET ID FOR FIRE EVENT TO SPECIFic IDS ----#
    public function getSocketId(Request $request)
    {
        if ($request->socketId) {
            $user =    User::where('socket_id', $request->socketId)->first();
            $userId = $user->id;

            $users =    Thread::select('threads.*')
                ->addSelect(DB::raw('(CASE WHEN sender_id = ' . $userId . ' THEN receiver_id ELSE sender_id END) as user_id'))
                ->where(function ($query) use ($userId) {
                    $query->where('sender_id', $userId)
                        ->orWhere('receiver_id', $userId);
                })
                ->pluck('user_id')->toArray();
            $userSocket =  User::whereNotNull('socket_id')->whereIn('id', $users)->pluck('socket_id')->toArray();
            return $userSocket;
            return response()->json(['status' => 200, 'message' => 'users', 'data' => $userSocket]);
        }
    }

    #--- GET CALL DETAILS ---#
    public function getCalls(Request $request)
    {

        $userId = Auth::id();

        $data = Thread::select(
            'call_logs.id',
            'call_logs.from_user',
            'call_logs.to_user',
            'call_logs.duration',
            'call_logs.created_at',
            'call_logs.by_userId',
            'call_logs.type'
        )
            ->addSelect(DB::raw('(CASE WHEN sender_id = ' . $userId . ' THEN receiver_id ELSE sender_id END) as user_id'))
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);
            })
            ->whereNotNull('duration')
            ->join('call_logs', function ($join) {
                $join->on('threads.id', '=', 'call_logs.thread_id');
            })
            ->groupBy(
                'call_logs.id',
                'call_logs.from_user',
                'call_logs.to_user',
                'call_logs.duration',
                'call_logs.created_at',
                'sender_id',
                'by_userId',
                'receiver_id',
                'type'
            )
            ->orderBy('call_logs.created_at', 'desc') // Order by a valid column
            ->get()
            ->map(function ($query) {
                $query->duration = formatDuration($query->duration);
                $query->date_time = Carbon::parse($query->created_at)->format('d M Y, h:ia');
                $query->callVideo = $query->type === 'video' ? true : false;
                $query->mutipleUsercalls = false;
                $query->profile = "";
                $query->user_name = ($query->by_userId == Auth::id()) ? $query->to_user : $query->from_user;
                $query->callArrowType = ($query->by_userId == Auth::id()) ? "ri-arrow-right-up-fill text-success align-bottom" : "ri-arrow-left-down-fill text-danger align-bottom";

                return $query;
            });

        return response()->json(['status' => 200, 'data' => $data]);
    }

    // Delete chats 
    public function deleteChat(Request $request)
    {
        if ($request->id && $request->type) {
            if ($request->type == 'all') {
                $messages = Message::where('thread_id', $request->id)->get();
                if ($messages) {
                    foreach ($messages as $message) {
                        $message->deleteForUser(Auth::id());
                    }
                    return response()->json(['status' => 200, 'message' => 'Chat deleted successfully']);
                }
            }
            if ($request->type == 'message') {
                $message = Message::where('id', $request->id)->first();
                $message->deleteForUser(Auth::id());
                return response()->json(['status' => 200, 'message' => 'Message deleted successfully']);
            }
        }

        return response()->json(['status' => 400, 'message' => 'Something went wrong'], 404);
    }

    //Mute - unMute users 
    public function muteUser(Request $request)
    {
        $user = auth()->user();
        $thread = Thread::find($request->threadId);
        if ($thread) {
            if ($request->type == 'mute') {
                $thread->muteUser($user->id);
                return response()->json(['status' => 200, 'message' => 'User muted successfully']);
            } else {
                $thread->unmuteUser($user->id);
                return response()->json(['status' => 200, 'message' => 'User un-muted successfully']);
            }
        }
        return response()->json(['status' => 400, 'message' => 'Something went wrong'], 404);
    }


    //Delete threads 
    public function deleteThread(Request $request)
    {
        $user = auth()->user();
        $thread = Thread::find($request->threadId);

        if ($thread) {
            $thread->deleteForUser($user->id);
            return response()->json(['status' => 200, 'message' => 'User deleted successfully']);
        }

        return response()->json(['status' => 400, 'message' => 'Something went wrong'], 404);
    }

    // FileController.php
    public function downloadMessageMedia($type, $mediaId)
    {
        if (!empty($mediaId) && !empty($type)) {
            if ($type == 'message') {
                $media = messageMedia::where('message_id', $mediaId)->first();
            }
            if ($type == 'media') {
                $media = messageMedia::where('id', $mediaId)->first();
            }
        }
        if (Storage::exists($media->file)) {
            return Storage::download($media->file);
        }
    }

    // Get Users List
    public function getUsersList(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('id', '!=', Auth::id())->where('name', 'LIKE', "%{$search}%")->get();

        return response()->json($users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'image' => $user->image
            ];
        }));
    }

    // Forward messages to users 
    public function forwardMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'users' => ['required', 'array'],
            'users.*' => ['required', 'integer', 'exists:users,id'],
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => 'Please select contacts']);
        }
        // check first thread is created or not if yes then send message else create new thread // send push also 
        $users = $request->users;
        DB::beginTransaction();
        try {
            $notifcation = new webpushNotificationController();

            foreach ($users as $user) {
                $userId = $user;
                #----- Check Thread exists or not ------#
                $thread  = Thread::where('sender_id', Auth::id())->where('receiver_id', $userId)->orwhere(function ($query) use ($userId) {
                    $query->where('sender_id', $userId)->where('receiver_id', Auth::id());
                })->first();

                if (empty($thread)) {
                    $thread = new Thread();
                    $thread->sender_id = Auth::id();
                    $thread->receiver_id =  $userId;
                    $thread->token = random_int(111111, 999999);
                    $thread->save();
                    $thread->is_new = true;
                }
                $message = Message::with('media')->find($request->id);
                if ($message) {
                    $forwardMessage = new Message();
                    $forwardMessage->thread_id = $thread->id;
                    $forwardMessage->sender_id = Auth::id();
                    $forwardMessage->receiver_id = $thread->receiver_id;
                    $forwardMessage->message = $message->message;
                    $forwardMessage->message_type = $message->message_type;
                    $forwardMessage->has_media = $message->has_media;
                    $forwardMessage->save();

                    if ($message->has_media) {
                        foreach ($message->media as $media) {
                            $file = $media->file;
                            $fileType = $media->file_type;
                            $this->saveMedia($forwardMessage->id, $media->file, $media->file_size, $media->file_type, $media->file_name);
                        }
                    }
                }
                $thread = Thread::find($thread->id);
                $thread->last_message = $message->message;
                $thread->message_type = $message->message_type;
                $thread->file = $file ?? '';
                $thread->file_type = $fileType ?? '';
                $thread->save();

                if (!$thread->isUserMuted($userId)) {
                    $userDetails = User::where('id', $userId)->whereNotNull('device_token')->first();
                    if ($userDetails && $userDetails->device_token) {
                        $token = $userDetails->device_token;
                        $notifcation->sendToDeviceTokens($token, Auth::user()->name, $message->message, $message->message_type);
                    }
                }
            }
            DB::commit();
            return response()->json(['status' => 200, 'message' => 'Message forward to selected users.']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }


    // Message reaction 
    public function messageReaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reaction' => 'required',
            'threadId' => 'required|exists:threads,id',
            'messageId' => 'required|exists:messages,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => 'something went wrong']);
        }
        try {

            $result = MessageReaction::where(['user_id' => Auth::id(), 'thread_id' => $request->threadId, 'message_id' => $request->messageId])->first();
            if ($result) {
                $reaction =  $result;
                $reaction->reaction =  $request->reaction;
                $reaction->save();
            } else {
                $reaction = new MessageReaction();
                $reaction->user_id = Auth::id();
                $reaction->thread_id = $request->threadId;
                $reaction->message_id = $request->messageId;
                $reaction->reaction =  $request->reaction;
                $reaction->save();
            }
            return response()->json(['status' => 200, 'message' => 'reaction success']);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => 'something went wrong']);
        }
    }
}
