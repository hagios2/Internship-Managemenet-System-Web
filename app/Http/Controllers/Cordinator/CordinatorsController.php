<?php

namespace App\Http\Controllers\Cordinator;

use Illuminate\Http\Request;
use App\Department;
use App\OtherApplicationApproved;
use App\Appointment;
use App\InternshipApplication;

use App\Http\Controllers\Controller;

class CordinatorsController extends Controller
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

    public function getDepartmentProgram(Department $department)
    {
        $program = $department->program; 

        return response()->json($program, 200);
    }

}

/* 

view approved application and student by name or by location
view approve open application
schedule metting
check student attendance
*/

