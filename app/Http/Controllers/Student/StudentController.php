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
use FarhanWazir\GoogleMaps\Facades\GMapsFacade as GMaps;

class StudentController extends Controller
{
    protected $connection;

    public function __contruct()
    {
        $this->middleware('auth');
       // $this->middleware('verified');

       $connection = Redis::connection();
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
        $config['placesAutocompleteBoundsMap'] = TRUE;
        $config['placesAutocompleteOnChange'] = 'document.getElementById("other_div").innerHTML = \'<input type="hidden" name="preferred_company_latitude" value="\'+event.latLng.lat()+\'"> <input type="hidden" name="preferred_company_longitude" value="\'+event.latLng.lng()+\'" > \'';

        GMaps::initialize($config);
    
        $marker['position'] = "{$lat}, {$long}";
        $marker['draggable'] = true;
        $marker['ondragend'] =  'document.getElementById("other_div").innerHTML = \'<input type="hidden" name="preferred_company_latitude" value="\'+event.latLng.lat()+\'"> <input type="hidden" name="preferred_company_longitude" value="\'+event.latLng.lng()+\'" > \'';
       
        GMaps::add_marker($marker);
        $map = GMaps::create_map(); 
        /* echo $map['js'];
        echo $map['html'];   */

        return $map;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $map = $this->googleMap();

        return view('student.application_form', compact('map'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InternshipFormRequest $request)
    {
#        return $request->all();

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

        if($application->default_application && !$application->company->approved_application)
        {
            return redirect('/dashboard')->with('info', 'Assess Denied!');
        
        }else if($application->preferred_company && !$application->approvedProposedApplicaton)
        {
            return redirect('/dashboard')->with('info', 'Assess Denied!');
        }

        $appointment = auth()->user()->application->appointment;

        return view('student.intern', compact('appointment'));
        
    }


    public function getCompanyCoordinates(){

        $application = auth()->user()->application;

        $coords = [

            'lat' => $application->default_application ? $application->company->lat : $application->preferred_company_latitude,

            'long' => $application->default_application ? $application->company->long : $application->preferred_company_longitude,

            'location' => $application->default_application ? $application->company->location : $application->preferred_company_location,
        ];


        return $coords;

    }

    public function destroy(InternshipApplication $application)
    {
        $application->delete();

        return redirect('/dashboard')->with('success', 'Your application has been deleted successfully');
    }

}
