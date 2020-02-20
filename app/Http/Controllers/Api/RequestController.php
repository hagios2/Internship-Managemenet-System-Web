<?php

namespace App\Http\Controllers\Api;

use App\Program;
use App\Level;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Resources\levelsResource;
use App\Http\Resources\ProgramsResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationApiRequest;

class RequestController extends Controller
{
    
    public function getPrograms()
    {

        return ProgramsResource::collection(Program::all());
    }

    public function getLevels()
    {

        return ProgramsResource::collection(Level::all());
    }

    public function register(UserRegistrationApiRequest $request)
    {
       $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'index_no' => $request['index_no'],
            'program_id' => $request['program'],
            'level_id' => $request['level'],
            'phone'=> $request['phone'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json(['status' => 'success', 'user' => $user ]);

    }
}

