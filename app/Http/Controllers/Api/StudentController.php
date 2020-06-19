<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ToggleApp;
use App\Company;
use App\InternshipApplication; 
use App\Http\ApiInternshipFormRequest;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }


    public function sendCompany()
    {
        $toggleApp = ToggleApp::find(1);

        if($toggleApp->toggle)
        {
            return response()->json(['companies' => Company::all()]);
        }

        return response()->json(['status' => 'application down']);
    }

    public function studentApplication(ApiInternshipFormRequest $request)
    {

        if(InternshipApplication::where('student_id', auth()->guard('api')->id())->first())
        {
            return response()->json(['status' => 'You have already applied! Consider editing your application instead.']);
        }

        if($request->has('default_application'))
        {
            $company = Company::findOrFail($request->company_id);

            if($company->application->count() < $company->total_slots)
            {
                auth()->guard('api')->user()->registerStudent($request->all());
            
            }else{
    
                return response()->json(['status' => 'Denied! maximum application to ' .$company->company_name .' reached.']);
            }

        } else {

            auth()->guard('api')->user()->registerStudent($request->all());

        }

        SendInternshipRegistrationNotification::dispatch(auth()->guard('api')->user());
         
        return response()->json(['status' => 'Success']);

    }

    public function edit(InternshipApplication $application)
    {
        abort_if((auth()->guard('api')->user() != $application->student), 403);

        if($application->preferred_company)
        {
            $map = $this->googleMap($application->preferred_company_latitude, $application->preferred_company_longitude);

            return view('student.edit_application',\compact('application', 'map'));
        }

        return view('student.edit_application', compact('application'));
    }

    public function update(Request $request, InternshipApplication $application)
    {
        abort_if((auth()->guard('api')->user() != $application->student), 403);


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

        return response()->json(['status' => 'Updated successfully']);
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

        return response()->json(['status' => 'internship started']);
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

        $application = auth()->guard('api')->user()->application;

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

        return response()->json(['status' => 'Application Deleted']);
    }

    public function checkIn(Request $request)
    {
        $alreadyCheckedAttendance = json_decode($this->checkAttendance()->getContent(), true);

        if($alreadyCheckedAttendance['checked_in'])
        {
            return response()->json(['status' => 'denied']);
        }
    
        $user = auth()->user();

        $user->addInternsAttendance($request->all());

        return response()->json(['status' => 'success']);

    }

    public function checkOut()
    {
        $latestDate =  Intern::where('user_id', auth()->id())->latest()->first();

        if($latestDate)
        {

        $latest = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latestDate->check_in_timestamp)->format('Y-m-d');

        if($latest === date('Y-m-d') && $latestDate->check_out_timestamp == null)
        {

            $latestDate->update([
                'check_out_timestamp' => now()
            ]);

            return redirect('/dashboard')->with('success', 'You checked out for today');

        }else if($latestDate->check_out_timestamp !== null){

            return back()->with('error', 'Denied! You\'ve check out for the day');

        }
        }

        return back()->with('error', 'You haven\'t checked in');
    }


    public function requestSupervisorApproval(Request $request)
    {

        $alreadyCheckedAttendance = json_decode($this->checkAttendance()->getContent(), true);

        if($alreadyCheckedAttendance['checked_in'])
        {
            return response()->json(['status' => 'denied']);
        }
    
    
        $user = auth()->user();

        $user->addRequestSupervisorApproval($request->all());

        return response()->json(['status' => 'success']);

    }

    public function checkAttendance()
    {
        $latestDate =  Intern::where('user_id', auth()->id())->latest()->first();

        if($latestDate)
        {

        $latest = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latestDate->check_in_timestamp)->format('Y-m-d');

        if($latest === date('Y-m-d'))
        {
            return response()->json(['checked_in' => true]);
            }else{
                return response()->json(['checked_in' => false]);
            }
        }

        return response()->json(['checked_in' => false]);

    }

    public function logoutApi()
    {
        $user = auth()->guard('api')->user()->token();
    
        $user->revoke();
    
        return response()->json(['status' => 'logged out']);
    }


}


/* 
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
   
    return $map;
} */

