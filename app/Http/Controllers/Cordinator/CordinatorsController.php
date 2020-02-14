<?php

namespace App\Http\Controllers\Cordinator;

use Illuminate\Http\Request;
use App\Department;
use App\OtherApplicationApproved;
use App\Http\Resources\StudentDataAndApplication;
use App\Program;
use App\Appointment;
use App\InternshipApplication;
use App\Company;

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

    public function getDepartmentProgram(Department $department)
    {
        $program = $department->program; 

        return response()->json($program, 200);
    }

    public function scheduleAppointments(Request $request)
    {
        if($request->has('company_id'))
        {
            $applicationType = Company::find($request->company_id);

            $request['company_appointment'] = true;
        
        }else if ($request->has('appointment_id')){

            $applicationType = InternshipApplication::find($request->appointment_id);

            $request['other_app_appointment'] = true;
        }
    
        if($applicationType->appointment)
        {
            return response(['status' => 'Appointment already booked with company'], 200);    
        }

        $applicationType->addAppointment($request->all());

        return response(['counts' => auth()->guard('cordinator')->user()->appointment->count(), 'status' => 'success'],200);

    }


    public function getProgramsStudent(Program $program)
    {

        return StudentDataAndApplication::collection($program->student);
        //return response()->json($program->student, 200);
    }

    public function studentApplication(InternshipApplication $application)
    {
        return response()->json($application);
    }

}

/* 

view approved application and student by name or by location
view approve open application
schedule metting
check student attendance
*/

