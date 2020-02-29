<?php

namespace App\Http\Controllers\Supervisor;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\ConfirmedApplicationCode;
use App\InternshipApplication;
//use Chumper\Zipper\Zipper as Zipper;

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
        
       $confirmedAppcode = auth()->guard('supervisor')->user()->internsApplication; 

       if($confirmedAppcode->company)
       {

            $studentApplication = InternshipApplication::where('company_id', $confirmedAppcode->company->id)->paginate(4);

       } else {

            $studentApplication = $confirmedAppcode->application;
        }

        return view('supervisor.students', \compact('studentApplication', 'confirmedAppcode'));
    }


    public function show(User $student)
    {
        if($student->application->company)
        {
            abort_if((auth()->guard('supervisor')->id() !== $student->application->company->confirmedAppCode->supervisor_id  ), 403);
        
        }else{

            abort_if((auth()->guard('supervisor')->id() !== $student->application->confirmedAppCode->supervisor_id  ), 403);

        }
       
        $application = $student->application;

        return view('supervisor.view_student', compact('application'));
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


    public function downloadAssessmentForms()
    {
        $zipper = new \Chumper\Zipper\Zipper;
     
        $files = glob(storage_path('app/public/assessment forms/*'));

        $zip_path = storage_path('app/public/assessment.zip');
        
        $zipper->make($zip_path)->add($files)->close();

        return response()->download('storage/assessment.zip');    

        return back();
    }

/* 
    public function download($path, $filename)
    {
         //headers
         $headers = array(
        
            'Content-Type: application/pdf',
        );

        return response()->download([$path, $filename, $headers]);
    } */



}
