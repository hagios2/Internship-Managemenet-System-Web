<?php

namespace App\Http\Controllers\MainCoordinator;

use App\Company;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyFormRequest;
use FarhanWazir\GoogleMaps\Facades\GMapsFacade as GMaps;

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
        return view('main_cordinator.companies.company');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $map = $this->googleMap();

        return view('main_cordinator/companies/create_company', compact('map'));
    }

    public function googleMap($lat='5.603716800000001', $long='-0.18696439999996528')
    {
        $config = array();
        $config['center'] = 'auto';
        $config['zoom'] = 'auto';
        $config['map_height'] = '500px';
        $config['scrollwheel'] = true;
        $config['places'] = true;
        $config['placesAutocompleteInputID'] = 'companyTextBox';
        $config['placesAutocompleteBoundsMap'] = true;
        $config['placesAutocompleteOnChange'] = 'document.getElementById("other_div").innerHTML = \'<input type="hidden" name="lat" value="\'+event.latLng.lat()+\'"> <input type="hidden" name="long" value="\'+event.latLng.lng()+\'" > \'';

        GMaps::initialize($config);

        $marker['position'] = "{$lat}, {$long}";
        $marker['draggable'] = true;
        $marker['ondragend'] =  'document.getElementById("other_div").innerHTML = \'<input type="hidden" name="lat" value="\'+event.latLng.lat()+\'"> <input type="hidden" name="long" value="\'+event.latLng.lng()+\'" > \'';

        GMaps::add_marker($marker);
        $map = GMaps::create_map();
        /* echo $map['js'];
        echo $map['html'];   */

        return $map;
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

        return  redirect('/main-cordinator/company')->with('success', 'Company was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company_applications = $company->application;

        return view('main_cordinator.companies.view_company', \compact('company', 'company_applications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $map = $this->googleMap($company->lat, $company->long);

        return view('main_cordinator.companies.edit_company', \compact('company', 'map'));
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

        return redirect('/main-cordinator/company')->withSuccess('Updated '. $request->company_name . ' successfully');
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
