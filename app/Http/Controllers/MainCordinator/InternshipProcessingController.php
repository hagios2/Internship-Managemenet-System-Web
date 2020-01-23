<?php

namespace App\Http\Controllers\MainCordinator;

use App\Company;
use App\InternshipApplication;
use App\Http\Jobs\SendIntroductionLetter;
use App\ApprovedApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProposedApplicationResource;
use App\Http\Resources\RequestOpenLetterResource;

class InternshipProcessingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:main-cordinator');
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
        return view('main_cordinator.other_application');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function default_application()
    {
        return redirect('/main-cordinator/company')->with('info', ' Click on a company to view student who applied for that company');
    }

    public function processApplication(ApprovedApplication $application)
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

        $application->approved_letter = '/storage/Introductory Letters/'.$application->id.'/'.$fileName;

        $application->save();

        SendIntroductionLetter::dispatch($application);

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

        return back()->withSuccess($application->student->name . ' removed from applicants list');
    }

    public function approve_application(Company $company)
    {
       if($company->approved_application)
       {
           return back()->with('info', 'Application has already been approved');
       }   

     ApprovedApplication::create([

            'company_id' => $company->id,

            'approved' => true
       ]);
    

       return back()->withSuccess('Application Approved. You may Send introductory letter now');
    }

}