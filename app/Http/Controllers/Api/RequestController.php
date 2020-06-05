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

        return response()->json(['status' => 'success']);

    }

  /*   public function postToken(Request $request)
    {
        if($request->has('api_token'))
        {
            $user = User::where('email', $request->email)->get();

            $user->update([
                
                'api_token' => $request->api_token
            ]);

            return response()->json(['status' => 'Token saved']);
        }

        return response()->json(['status' => 'No token received']);
    } */
}