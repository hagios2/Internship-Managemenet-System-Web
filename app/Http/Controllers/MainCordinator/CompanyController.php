<?php

namespace App\Http\Controllers\MainCordinator;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyFormRequest;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('main_cordinator');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return  $company = Company::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view
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

       if ($company) {
           
            return ['success' => 'Company was created successfully'];
       }else{

            return ['error' => 'Something went wrong'];
       }
        

        return redirect('/company')->withSuccess('Company added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company['location'] = $company->region->region;

        return ['company' => $company];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyFormRequest $company)
    {
       
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

        if($company)
        {
            return ['success' => 'Company was updated successfully'];
       }else{

            return ['error' => 'Something went wrong'];
       }
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

        return ['deleted_company' => $company->company_name];

        return redirect('/company')->withSuccess('Deleted '. $company->company_name . ' deleted successfully');
    }
}
