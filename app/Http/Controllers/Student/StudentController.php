<?php

namespace App\Http\Controllers\Student;

use App\Region;
use App\Company;
use App\InternshipApplication;
use Illuminate\Http\Request;
use App\Http\Requests\InternshipFormRequest;
use App\Http\Controllers\Controller;
use App\Jobs\SendInternshipRegistrationNotification;

class StudentController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
        $this->middleware('verified');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Region::all();

        $companies = Company::all();

        return view('student.application_form', \compact('locations', 'companies'));
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
            return back()->with('error', 'You have already applied! You can edit your application instead.');
        }

        auth()->user()->registerStudent($request->all());

       SendInternshipRegistrationNotification::dispatch(auth()->user());

        return back()->with('success', 'Application received! You can modify your application before the deadline.');

    }

    public function preferredCompany(Request $request)
    {
        if(StudentsRegion::where('student_id', auth()->id())->first())
        {
            return back()->with('error', 'You have already applied! You can edit your application instead.');
        }

    }

    public function openApplication()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentsRegion $application)
    {
        return view('student.edit_application', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
