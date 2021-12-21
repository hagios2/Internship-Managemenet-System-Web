<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCordinator;
use App\StudentNotification;
use App\Http\Resources\StudentMessageResource;
use App\Message;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $attributes = [

            'message' => nl2br($request->message),

            'from_student' => true,

            'attachment' => null
        ];

        $application = auth()->user()->application;

        if($application->default_application):

            $attributes['company_id'] = $application->company->id;

        else:
            $attributes['application_id'] = $application->id;            

        endif;

        $created_message = auth()->user()->addMessage($attributes);

        if($created_message)
        {   
            $main_cordinator = MainCordinator::find(1);

            $token = $main_cordinator->device_token;

            Message::toSingleDevice($token, 'student message', nl2br($request->message), null, '/message'); 

            return response()->json(['status' => 'success']);
        
        }else{

            return response()->json(['status' => 'failed']);
        }

    }


    public function getMessages()
    {
        if(auth()->user()->message):

        return StudentMessageResource::collection(Message::studentsAllMessages());

        else:

            return response('no message');

        endif;
    }
    
}
