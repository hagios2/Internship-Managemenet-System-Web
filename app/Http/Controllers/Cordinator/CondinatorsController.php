<?php

namespace App\Http\Controllers\Cordinator;

use Illuminate\Http\Request;
use App\OtherApplicationApproved;
use App\Appointment;
use App\InternshipApplication;
use App\Http\Controllers\Controller;

class CondinatorsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:cordinator');
    }


    public function viewApplication()
    {

    }


    public function scheduleAMeeting(Request $request)
    {

        Appointment::create($request->all());

        return back()->withSuccess('Appointment booked');
                
    }

}

/* 

view approved application and student by name or by location
view approve open application
schedule metting
check student attendance
*/