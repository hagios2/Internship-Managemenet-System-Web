<?php

namespace App\Http\Controllers\Student;

use App\Region;
use App\Company;
use App\Department;
use App\InternshipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\InternshipFormRequest;
use App\Http\Controllers\Controller;
use App\Jobs\SendInternshipRegistrationNotification;

class StudentController extends Controller
{
    protected $connection;

    public function __contruct()
    {
        $this->middleware('auth');
       // $this->middleware('verified');

       $connection = Redis::connection();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('student.application_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InternshipFormRequest $request)
    {

        if(InternshipApplication::where('student_id', auth()->id())->first())
        {
            return back()->with('error', 'You have already applied! Consider editing your application instead.');
        }

        if($request->has('default_application'))
        {
            $company = Company::findOrFail($request->company_id);

            if($company->application->count() < $company->total_slots)
            {
                auth()->user()->registerStudent($request->all());
            
            }else{
    
                return back()->with('info', 'Denied! maximum application to ' .$company->company_name .' reached.');
            }

        } else {

            auth()->user()->registerStudent($request->all());

        }

        SendInternshipRegistrationNotification::dispatch(auth()->user());
         
        return redirect('/dashboard')->with('success', 'Application received! You can modify your application before the deadline.');


      

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(InternshipApplication $application)
    {
        abort_if((auth()->user() != $application->student), 403);

        return view('student.edit_application', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student \compact('locations')
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternshipApplication $application)
    {
        abort_if((auth()->user() != $application->student), 403);
//return $application;

        if($request->has('company_id'))
        {
            if($application->company->approved_application)
            {
                return back()->with('error', 'Access Denied! Application already approved');
            }

        }else if ($request->has('preferred_company')) {

            if($application->approvedProposedApplicaton)
            {
                return back()->with('error', 'Access Denied! Application already approved');
            }

        }
      
        $application->update($request->all());

        return redirect('/dashboard')->withSuccess('Updated successfully');
    }


    public function startInternship(InternshipApplication $application)
    {
        if($application->company)
        {
            if(!$application->company->approved_application)
            {
                return back()->with('error', 'Access Denied! Application Approval Pending');
            }

        }else if(!$application->approvedProposedApplicaton){

            return back()->with('error', 'Access Denied! Application Approval Pending');
        }
        
        $application->update(['started_at' => now()]);

        return redirect('/interns');
    }


    public function approveAppointment(Appointment $appointment)
    {

        $appointment->appointmentNoted();

        return back()->withSuccess('You approved appointment');

    }

    public function interns()
    {

        $application = auth()->user()->application;

        abort_if((!$application->approvedProposedApplicaton && !$application->company->approved_application), 403);

        $appointment = auth()->user()->application->appointment;

        return view('student.intern', compact('appointment'));
        
    }

    public function destroy(InternshipApplication $application)
    {
        $application->delete();

        return redirect('/dashboard')->with('success', 'Your application has been deleted successfully');
    }

}
