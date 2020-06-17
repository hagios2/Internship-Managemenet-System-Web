<?php

namespace App\Http\Controllers\Cordinator;

use Illuminate\Http\Request;
use App\Department;
use App\OtherApplicationApproved;
use App\Http\Resources\StudentDataAndApplication;
use App\Http\Resources\OtherApplicantsListForAppointment;
use App\Program;
use App\User;
use App\Appointment;
use App\InternshipApplication;
use App\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class CordinatorsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:cordinator');
    }


    public function viewApplication(Department $department)
    {
        #show the applications for first program of the department
        
       // return auth()->guard('cordinator')->id();

        $first_program = $department->program->first();

        return $this->viewProgramApplication($first_program);

    }

    public function getProgram(Request $request)
    {
        $program = Program::find($request->program);

        abort_if(($program->department != auth()->guard('cordinator')->user()->department), 403);

        return $this->viewProgramApplication($program);

    }


    public function viewProgramApplication(Program $program)
    {

        $program_application = \collect();

        $applications = InternshipApplication::all();

        foreach($applications as $application)
        {
            #get a fresh instance of program

            $new_program = Program::find($program->id);

            #check if application is approved by it type
            
            if($application->default_application && $application->company->approved_application)
            {
                #check if this applicant is reads the requested program

                if($application->student->program == $new_program)
                {
                    # add applicant to collection

                    $program_application->add($application);
                }

                #check if application is approved by it type

            } elseif($application->preferred_company && $application->approvedProposedApplicaton){

                #check if this applicant is reads the requested program

                if($application->student->program == $new_program)
                {
                    # add applicant to collection

                    $program_application->add($application);
                }
                
            }

        }

        return view('cordinator.view_students', compact('program_application', 'new_program'));
    }

    public function viewStudentApplication(User $student)
    {

       $attendance = $this->viewAttendance($student);

        return view('cordinator.show', compact('student', 'attendance'));
    }

    public function getAssessmentFiles(User $student)
    {
        $assessmentfiles = collect();

        $files = Storage::allFiles("public/Filled Assessment Forms/$student->id");

        foreach($files as $file)
        {
            $assessmentfiles->add(explode('/', $file, 4)[3]);
        }

        return response()->json(['files' => $assessmentfiles], 200);
    }

    public function viewFile(User $student, $file)
    {

       $path = storage_path('app/public/Filled Assessment Forms/'.$student->id.'/'.$file);

        return response()->file($path);
    }

    public function assessStudent(User $student , Request $request)
    {
       /*  return $request->all(); */
        
        $assessment = $student->assessment;

        $request['cordinator_id'] = auth()->guard('cordinator')->id();

        $assessment->update($request->all());

        return response()->json(['status' => 'success']);

    }


    public function viewAttendance(User $student)
    {

        $intern = $student->intern;

        $attendance = collect();

        foreach($intern as $internship_day)
        {
            if($internship_day->off_premises)
            {
                if($internship_day->approved_by_supervisor)
                {
                    $attendance->push([

                        'date' => Carbon::createFromFormat('Y-m-d H:i:s', $internship_day->created_at)->format('Y-m-d'),
        
                        'check_in_time' =>  implode(explode(':',Carbon::createFromFormat('Y-m-d H:i:s', $internship_day->check_in_timestamp)->format('H:i'))),

                        'check_out_time' =>  implode(explode(':',Carbon::createFromFormat('Y-m-d H:i:s', $internship_day->check_out_timestamp)->format('H:i')))

                       /*              'check_out' => [

                        'date' => Carbon::createFromFormat('Y-m-d H:i:s', $internship_day->check_out_timestamp)->format('Y-m-d'),
        
                        'time' =>  Carbon::createFromFormat('Y-m-d H:i:s', $internship_day->check_out_timestamp)->format('H-i-s')
                            
                    ]
             */
                ]);


                }

            }else{
                $attendance->push([

                    'date' => Carbon::createFromFormat('Y-m-d H:i:s', $internship_day->check_in_timestamp)->format('Y-m-d'),
    
                    'check_in_time' =>  implode(explode(':',Carbon::createFromFormat('Y-m-d H:i:s', $internship_day->check_in_timestamp)->format('H:i'))),

                    'check_out_time' =>  implode(explode(':',Carbon::createFromFormat('Y-m-d H:i:s', $internship_day->check_out_timestamp)->format('H:i')))

                   /*              'check_out' => [

                    'date' => Carbon::createFromFormat('Y-m-d H:i:s', $internship_day->check_out_timestamp)->format('Y-m-d'),
    
                    'time' =>  Carbon::createFromFormat('Y-m-d H:i:s', $internship_day->check_out_timestamp)->format('H-i-s')
                        
                ]
         */
            ]);


            }
        } 


        return $attendance;



    }


/*         'date' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d'),

        'time' =>  Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('H-i-s') */
    



   /*  public function getDepartmentProgram(Department $department)
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
        
        }else if ($request->has('application_id')){

            $applicationType = InternshipApplication::find($request->application_id);

            $request['other_app_appointment'] = true;
        }
    
        if($applicationType->appointment)
        {
            return response(['status' => 'Appointment already booked with company', 'counts' => auth()->guard('cordinator')->user()->appointment->count(),], 200);    
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

    public function otherApplications(Request $request)
    {
        $application = InternshipApplication::where([['preferred_company', true], ['preferred_company_city', request()->region_id]])->get();

        return OtherApplicantsListForAppointment::collection($application);
    }
 */
}

/* 

view approved application and student by name or by location
view approve open application
schedule metting
check student attendance
*/

