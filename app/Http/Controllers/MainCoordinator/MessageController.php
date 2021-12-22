<?php

namespace App\Http\Controllers\MainCoordinator;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainCordUniqueChatResource;
use App\Http\Resources\StudentMessageResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:main_cordinator');
    }

    public function index()
    {
        return view('main_cordinator.chat');
    }

    public function store(User $user, Request $request)
    {
        $attributes = [

            'message' => nl2br($request->message),

            'from_main_cordinator' => true,

            'attachment' => null,

            'user_id' => $user->id,
        ];

        $application = $user->application;

        if ($application->default_application):

            $attributes['company_id'] = $application->company->id; elseif ($application->preferred_company):

            $attributes['application_id'] = $application->id;

        endif;

        $created_message = auth()->guard('main_cordinator')->user()->addMessage($attributes);

        if ($created_message) {
            $token = $user->device_token;

            Message::toSingleDevice($token, 'student message', nl2br($request->message), null, '/message');

            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'failed']);
        }
    }


    public function getMessages()
    {
        if (auth()->user()->message):

        return StudentMessageResource::collection(Message::studentsAllMessages()); else:

            return response('no message');

        endif;
    }

    public function getUniqueChat()
    {
        $messages = Message::all();

        $uniquechats = $messages->unique('user_id');

        $latestchats = \collect();

        foreach ($uniquechats as $chats) {
            $chatMessages = Message::where('user_id', $chats->user_id)->latest()->take(1)->get();

            foreach ($chatMessages as $chatMessage) {
                $latestchats->add($chatMessage);
            }
        }

        return MainCordUniqueChatResource::collection($latestchats);
    }
}
