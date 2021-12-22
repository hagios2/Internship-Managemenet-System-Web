<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssessmentFormRequest;
use App\Http\Resources\CheckInResource;
use App\Models\Assessment;
use App\Models\ConfirmedApplicationCode;
use App\Models\Intern;
use App\Models\InternshipApplication;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Http\Request;

class SupervisorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:supervisor')->except(['checkCode']);
    }


    public function assessStudent(AssessmentFormRequest $request, User $student)
    {

        if($student->assessment)
        {
            return back()->with('info', 'student has already been assessed');
        }
        
        
        $request['student_id'] = $student->id;

        //return $request->all();

        auth()->guard('supervisor')->user()->addStudentAssessment($request->all());

        return redirect('/supervisor/dashboard')->withSuccess('Assessment added for ' . $student->name);
    }


    public function editAssessment(Assessment $assessment, Request $request)
   {

        /* return $request->all(); */

        $assessment->update($request->all());

        return redirect('/supervisor/dashboard')->withSuccess('Updated Assessment successfully');
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


    public function uploadAssessmentForms(User $student, Request $request)
    {

        if($student->assessment):

            return back()->with('info', 'You have already assessed '.$student->name);

        endif;

        if($request->hasFile('assessmentFile')):

            $files = $request->file('assessmentFile');

            foreach($files as $file):

                $fileName = $file->getClientOriginalName();

                $file->storeAs('public/Filled Assessment Forms/'.$student->id, $fileName);

            endforeach;

            auth()->guard('supervisor')->user()->addStudentAssessment([

                'student_id' => $student->id,

                'filled_assessment_form' => '/storage/Filled Assessment Form/'.$student->id,
            ]);

            return back()->with('success', 'The files have been uploaded successfully');

        endif;


        return back()->with('info', 'Please attach assessment forms before submitting');
        
    }

    public function ApproveStudentCheckIn(Intern $intern, Request $request)
    {

        $application = $intern->student->application;

        if($application->default_application):

            abort_if((auth()->guard('supervisor')->id() !== $application->company->confirmedAppCode->supervisor_id), 403);

        else:

            abort_if((auth()->guard('supervisor')->id() !== $application->confirmedAppCode->supervisor_id), 403);

        endif;

        $intern->update([

            'supervisor_id' => auth()->guard('supervisor')->id(),

            'approved_by_supervisor' => $request->approve
        ]);

        $approved = ($request->approve == 1) ? 'Check in approved' : 'Check in denied';

        return redirect('/supervisor/dashboard')->withSuccess($approved);

    }

    /* This will return a specific coordinte  */
    public function getStudentRequestCoords(Intern $intern)
    {
        return new CheckInResource($intern);
    }


    public function viewStudentRequest(Intern $intern)
    {
        $application = $intern->student->application;

        if($application->default_application):

            abort_if((auth()->guard('supervisor')->id() !== $application->company->confirmedAppCode->supervisor_id), 403);

        else:

            abort_if((auth()->guard('supervisor')->id() !== $application->confirmedAppCode->supervisor_id), 403);

        endif;

       return view('supervisor.approve_student', compact('intern'))->with('info', 'Click on the marker to view check in details');

       /* return new CheckInResource($studentRequest); */

    }

    public function getApprovalRequests()
    { 
        $confirmedAppcode = auth()->guard('supervisor')->user()->internsApplication;

        if($confirmedAppcode->company)
        {
            $applications = $confirmedAppcode->company->application;

            $studentRequest = \collect();

            foreach ($applications as $application):

                $internsCheckIns = $application->student->intern;

                if ($internsCheckIns->count() !== 0):

                    foreach ($internsCheckIns as $checkIn):

                        if ($checkIn->supervisor_id == null && $checkIn->approved_by_supervisor == null):

                            $studentRequest->add($checkIn);

                        endif;
                
                    endforeach;

                endif;
            
            endforeach;

            return CheckInResource::collection($studentRequest);
 
        }else{

           $internsCheckIns = $confirmedAppcode->application->student->intern;

            if($internsCheckIns)
            {
                $studentRequest = \collect();

                if ($internsCheckIns->count() !== 0):

                    foreach ($internsCheckIns as $checkIn):

                        if ($checkIn->supervisor_id == null && $checkIn->approved_by_supervisor == null):
                            
                            $studentRequest->add($checkIn);

                        endif;
                
                    endforeach;

                    return CheckInResource::collection($studentRequest);

                endif;

            }else{
                return response()->json(['data' => 'empty']);

            }

 
        }

    }

    public function showProfileForm()
    {
        return view('supervisor.profile');
    }


    public function updateProfile(Supervisor $supervisor, Request $request)
    {
        auth()->guard('supervisor')->user()->update([

            'name' => $request->fname.' '.$request->sname,

            'email' => $request->email

        ]);

        return back()->withSuccess('Saved details successfully');

    }

}