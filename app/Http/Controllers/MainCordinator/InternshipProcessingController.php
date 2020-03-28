<?php

namespace App\Http\Controllers\MainCordinator;

use App\User;
use App\Company;
use App\Notification;
use App\StudentNotification;
use App\InternshipApplication;
use App\OtherApplicationApproved;
use App\Jobs\SendIntroductoryLetter;
use Illuminate\Support\Facades\Hash;
use App\Jobs\ApplicationDeniedJob;
use App\Jobs\ApplicationRevertedJob;
use App\Mail\ApplicationRevertedMail;
use App\Mail\ApplicationDeniedMail;
use App\Mail\SendIntroductoryLetterMail;
use App\Mail\SendConfirmedApplicationCode;
use App\ApprovedApplication;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProposedApplicationResource;
use App\Http\Resources\RequestOpenLetterResource;

class InternshipProcessingController extends Controller
{
    public  $redisConnection;

    public function __construct()
    {
        $this->middleware('auth:main_cordinator');

        $redisConnection = Redis::connection();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main_cordinator.student_application');
    }

    public function proposed_application()
    {
        $application = InternshipApplication::where('preferred_company', true)->get();

        return ProposedApplicationResource::collection($application);

    }

    public function request_open_letter()
    {
        $application = InternshipApplication::where('open_letter', true)->get();

        return RequestOpenLetterResource::collection($application);

    }

    public function other_application()
    {
        $applications = InternshipApplication::where('preferred_company', true)->get();

        static $count = 0;

        $unapproved = \collect();

        foreach($applications as $application)
        {
            $approved = $application->approvedProposedApplicaton;
         
            if(!$approved){

                $count++;

            }
        }

        return view('main_cordinator.other_application', compact('count'));
    }

/*     public function getStudent()
    {
        return User::where('name', 'like', request()->search, '%')->get('id', 'name');

        return request()->search;
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function default_application()
    {
        return redirect('/main-cordinator/company')->with('info', ' Click on a company to view student who applied for that company');
    }

    public function sendIntroductoryLetter(ApprovedApplication $application, Request $request)
    {

        if(!$application->approved)
        {
            return back()->with('info', 'Please ensure application to this company has been approved');
        }

        $request->validate([

            'letter' => 'required|file|mimes:pdf|max:1999',

        ]);

        $fileName = $request->file('letter')->getClientOriginalName();

        request()->file('letter')->storeAs('public/Letters/'.$application->id, $fileName);

        $application->approved_letter = 'storage/Letters/'.$application->id.'/'.$fileName;

        $application->save();

        $token = auth()->guard('main_cordinator')-user()->device_token;
        
        Notification::toSingleDevice($token, 'Trial title', 'trial body', null, null);

        //SendIntroductoryLetter::dispatch($application);

        return back()->withSuccess('Introductory letter Sent'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deny_application(InternshipApplication $application)
    {
        $application->delete();

        $application->student->addNotification([

            'main_cordinator_id' => auth()->guard('main_cordinator')->id(),

            'notification_type' => 'Application Denied',

            'route' => '/dashboard',

            'status' => 'Sorry! Your application has been denied. You may apply again'
        ]);

        $user = $application->student;

        \Mail::to($user->email)->send(new ApplicationDeniedMail($user)); 

   /*      ApplicationDeniedJob::dispatch($user); */

        return back()->withSuccess($application->student->name . ' removed from applicants list');
    }

    public function approve_application(Company $company)
    {

        if($company->application->count() > 0)
        {
        
            if($company->approved_application)
            {
                return back()->with('info', 'Application has already been approved');
            } 
 
           $companyApproved = $company->addApplicationApproval();  
 
        }else{

            return back()->with('error', 'Failed! '.$company->company_name .' has no application(s)');
        }

          $student = \collect();
 
            foreach($company->application as $application)
            {
                
               $application->student->addNotification([

                    'main_cordinator_id' => auth()->guard('main_cordinator')->id(),

                    'notification_type' => 'Approval',

                    'route' => '/dashboard',

                    'status' => 'Congratulations! Your application has been approved. Click on startbutton to proceed with your internship'
                ]); 
                
                $student->add($application->student);
                
            }
            
            Storage::disk('local')->makeDirectory("public/letters/company application/{$company->id}");

            $pdf = PDF::loadView('letters.intro_letters', \compact('application', 'student'));

            $path =  storage_path("app/public/letters/company application/{$company->id}/")."introductory letter.pdf";

            $pdf->save($path);

            $approvedApp = ApprovedApplication::find($companyApproved);

            $approvedApp->approved_letter = $path;

            $approvedApp->save();

            foreach($student as $applicant)
            {
                $this->dispatchApprovalMail($applicant->application);

            } 

          
     /*    Notification::toMultipleDevice($student, 'Application Approved', null, null, '/dashboard');
 */
        return back()->withSuccess('Application Approved with Introductory Letter dispatched to student(s) ');
    }

    public function dispatchApprovalMail(InternshipApplication $application)
    {
        \Mail::to($application->student)->send(new \App\Mail\SendIntroductoryLetterMail($application));


   /*      SendIntroductoryLetter::dispatch($application); */
    }


    public function previewFile(ApprovedApplication $application)
    {

        return response()->file($application->approved_letter);
    }

    public function removeFile(ApprovedApplication $application)
    {
        Storage::disk('public')->deleteDirectory('Letters/'.$application->id. '/');

        $application->approved_letter = null;

        $application->save();

       return back()->withSuccess('Attachment removed.');

    }

        /* you may use this function to approve all Proposed Applicaton */

    public function approveAll()
    {
        $applications = InternshipApplication::where('preferred_company', true)->get();

        static $count = 0;

        $unapproved = \collect();

        foreach($applications as $application)
        {
            $approved = $application->approvedProposedApplicaton;
         
            if(!$approved){

                $unapproved->add($application);

            }
        }

        foreach($unapproved as $unapproved_application)
        {                
            $approvedApplication =  $unapproved_application->addProposalApproval();

            $this->generateletterforotherApplication($unapproved_application, $approvedApplication);

            //copy company with letter using different mail template
            $this->copyOtherCompany($unapproved_application);

            $unapproved_application->student->addNotification([

                'main_cordinator_id' => auth()->guard('main_cordinator')->id(),

                'notification_type' => 'Approval',

                'route' => '/dashboard',

                'status' => 'Congratulations! Your application has been approved. Click on startbutton to proceed with your internship'
            ]);

            $count++;

        }
        

        return back()->withSuccess("{$count} Application(s) approved");

    }

    public function generateletterforotherApplication(InternshipApplication $application, $id)
    {
        Storage::disk('local')->makeDirectory("public/letters/proposed application/{$application->id}");

        $pdf = PDF::loadView('letters.other_intro_letters', \compact('application'));

       /*  return $pdf->stream(); */

        $path =  storage_path("app/public/letters/proposed application/{$application->id}/")."introductory letter.pdf";

        $pdf->save($path);

        $approvedApp = OtherApplicationApproved::find($id);

        $approvedApp->letter = $path;

        $approvedApp->save();

       \Mail::to($application->student)->send(new SendIntroductoryLetterMail($application, $path)); 

       /*  SendIntroductoryLetter::dispatch($application); */
    }

    /* you may use this function to approve individual Proposed Applicaton */

    public function approveProposedApplication(InternshipApplication $application)
    {

        if($application->approvedProposedApplicaton)
        {
            return back()->with('info', 'Application has already been approved');
        }
                
        $approvedApplication = $application->addProposalApproval(); 

        $application->student->addNotification([

            'main_cordinator_id' => auth()->guard('main_cordinator')->id(),

            'notification_type' => 'Approval',

            'route' => '/dashboard',

            'status' => 'Congratulations! Your application has been approved. Click on startbutton to proceed with your internship'
        ]);
        
        //send students intro letter
        $this->generateletterforotherApplication($application, $approvedApplication);

        //copy company with letter using different mail template
        $this->copyOtherCompany($application);
        
        return back()->withSuccess('Application approved');
    }

    public function revertProposedApplication(InternshipApplication $application)
    {
        if(!$application){

            return back()->with('error', 'Requested Application not found!');
        }

        $application->approvedProposedApplicaton->delete();

        $application->confirmedAppCode->delete();

        if($application->started_at != null)
        {
            $application->started_at = null;

            $application->save();
        }

        $user = $application->student;

        \Mail::to($user->email)->send(new ApplicationRevertedMail($user)); 

      /*   ApplicationRevertedJob::dispatch($user); */

        $application->student->addNotification([

            'main_cordinator_id' => auth()->guard('main_cordinator')->id(),

            'notification_type' => 'Reverted Application',

            'route' => '/dashboard',

            'status' => 'Sorry! Application\'s approval reverted'
        ]);

        return back()->withSuccess('Reverted Approval');
    }


    public function viewUnapproved()
    {
        $applications = InternshipApplication::where('preferred_company', true)->get();

        $unapproved = \collect();

        foreach($applications as $application)
        {
            $approved = $application->approvedProposedApplicaton;
         
            if(!$approved){

                $unapproved->add($application);

            }
        }

        return ProposedApplicationResource::collection($unapproved);

    }

    public function copycompany(Company $company)
    {
        $code = str_random(5);

        $confirmedtoken = $company->addConfirmApplicationCode($code);

        \Mail::to($company->email)->send(new SendConfirmedApplicationCode($confirmedtoken, $code));

        return back()->withSuccess('Letter sent to Company');  

    }


    public function copyOtherCompany(InternshipApplication $application)
    {

        if($application->preferred_company){

            $code = str_random(5);

           $confirmedtoken = $application->addConfirmApplicationCode($code);

            \Mail::to($application->preferred_company_email)->send(new SendConfirmedApplicationCode($confirmedtoken, $code));

        } else {

            return back();
        }   

    }

}