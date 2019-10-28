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
        $locations = Region::all();

        return view('main_cordinator/companies/create_company', compact('locations'));
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

       $company =  Company::addCompany(request('company_name'), request('location'), request('total_slots'));


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
        return ['company' => $company];
        
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
        $locations = Region::all();

        return view('main_cordinator.companies.edit_company', compact('company', 'locations'));
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
        $company->update([

            'company_name' => $request->company_name,

            'region_id' => $request->location,

            'total_slots' => $request->total_slots
        ]);

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
