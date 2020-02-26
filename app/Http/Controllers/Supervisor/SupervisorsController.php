<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\ConfirmedApplicationCode;

class SupervisorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:supervisor')->except(['checkCode']);
    }


    public function accessStudent()
    {

    }


    public function viewInterns()
    {
        return view('supervisor.view_student');
    }


    public function viewInternsAttendance()
    {

    }

    public function showAccessmentForm()
    {

        return view('supervisor.accessmentform');
    }

    public function checkCode(Request $request)
    {
        
        $confirmedToken = ConfirmedApplicationCode::where('code', $request->code)->take(1)->get();

        if($confirmedToken->isEmpty())
        {
            return response()->json(['code' => 'Not found'], 200);
        
        } else{ 

           foreach($confirmedToken as $confirmedApplication)
           {

            if($confirmedApplication->company)
            {
                return response()->json(['code' => 'success', 'company_id' => $confirmedApplication->company->id, 'application_id' => null], 200);
            
            } else if($confirmedApplication->application) {

                return response()->json(['code' => 'success', 'application_id' => $confirmedApplication->application->id, 'company_id' => null], 200);
            } 
           }

        }

    }

}


