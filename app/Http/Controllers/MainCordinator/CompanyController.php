<?php

namespace App\Http\Controllers\MainCordinator;

use App\Company;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyFormRequest;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:main_cordinator');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $company = Company::all();

       $region = Region::all('id', 'region');

       return view('main_cordinator.companies.company', compact('company', 'region'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = Region::all();

        return view('main_cordinator/companies/create_company', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {

        //persist in db

        $company =  Company::create($request->all());

        return  redirect('/main-cordinator/company')->with('success','Company was created successfully');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {

        return view('main_cordinator.companies.view_company', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $cities = Region::all();

        return view('main_cordinator.companies.edit_company', compact('company', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, Company $company)
    {
        $company->update($request->all());

        return back()->withSuccess('Updated '. $request->company_name . ' successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect('/main-cordinator/company')->withSuccess($company->company_name. " has been deleted successfully");

    }
}
