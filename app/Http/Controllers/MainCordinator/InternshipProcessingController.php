<?php

namespace App\Http\Controllers\MainCordinator;

use App\InternshipApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InternshipProcessingController extends Controller
{
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

        return ['data' => $application ];

    }

    public function other_application()
    {
        return view('main_cordinator.proposed_application');
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

    public function processApplication()
    {
        
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentsRegion  $studentsRegion
     * @return \Illuminate\Http\Response
     */
    public function show(StudentsRegion $studentsRegion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentsRegion  $studentsRegion
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentsRegion $studentsRegion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentsRegion  $studentsRegion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentsRegion $studentsRegion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentsRegion  $studentsRegion
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentsRegion $studentsRegion)
    {
        //
    }
}
