<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentAppointmentResource;
use App\Jobs\SendInternshipRegistrationNotification;
use App\Models\Company;
use App\Models\Intern;
use App\Models\InternshipApplication;
use App\Models\User;
use FarhanWazir\GoogleMaps\Facades\GMapsFacade as GMaps;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $connection;

    public function __construct()
    {
        $this->middleware('auth');
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
    public function store(Request $request)
    {
        if (InternshipApplication::where('student_id', auth()->id())->first()) {
            return back()->with('error', 'You have already applied! Consider editing your application instead.');
        }

        if ($request->has('default_application')) {
            $company = Company::findOrFail($request->company_id);

            if ($company->application->count() < $company->total_slots) {
                auth()->user()->registerStudent($request->except('_token'));

                $this->saveResume(auth()->user());
            } else {
                return back()->with('info', 'Denied! maximum application to ' .$company->company_name .' reached.');
            }
        } else {
            auth()->user()->registerStudent($request->except('_token'));

            $this->saveResume(auth()->user());
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

        if ($application->preferred_company) {
            $map = $this->googleMap($application->preferred_company_latitude, $application->preferred_company_longitude);

            return view('student.edit_application', \compact('application', 'map'));
        }

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


        if ($request->has('company_id')) {
            if ($application->company->approved_application) {
                return back()->with('error', 'Access Denied! Application already approved');
            }
        } elseif ($request->has('preferred_company')) {
            if ($application->approvedProposedApplicaton) {
                return back()->with('error', 'Access Denied! Application already approved');
            }
        }

        $application->update($request->all());

        return redirect('/dashboard')->withSuccess('Updated successfully');
    }


    public function startInternship(InternshipApplication $application)
    {
        if ($application->company) {
            if (!$application->company->approved_application) {
                return back()->with('error', 'Access Denied! Application Approval Pending');
            }
        } elseif (!$application->approvedProposedApplicaton) {
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

        if ($application->default_application && !$application->company->approved_application) {
            return redirect('/dashboard')->with('info', 'Assess Denied!');
        } elseif ($application->preferred_company && !$application->approvedProposedApplicaton) {
            return redirect('/dashboard')->with('info', 'Assess Denied!');
        }

        if (auth()->user()->application->preferred_company) {
            $appointment = auth()->user()->application->appointment;
        } elseif (auth()->user()->application->default_application) {
            $appointment = auth()->user()->application->company->appointment;
        }

        return view('student.intern', compact('appointment'));
    }


    public function getCompanyCoordinates()
    {
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

    public function checkIn(Request $request)
    {
        $alreadyCheckedAttendance = json_decode($this->checkAttendance()->getContent(), true);

        if ($alreadyCheckedAttendance['checked_in']) {
            return response()->json(['status' => 'denied']);
        }

        $user = auth()->user();

        $user->addInternsAttendance($request->all());

        return response()->json(['status' => 'success']);
    }

    public function checkOut()
    {
        $latestDate =  Intern::where('user_id', auth()->id())->latest()->first();

        if ($latestDate) {
            $latest = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latestDate->check_in_timestamp)->format('Y-m-d');

            if ($latest === date('Y-m-d') && $latestDate->check_out_timestamp == null) {
                $latestDate->update([
                'check_out_timestamp' => now()
            ]);

                return redirect('/dashboard')->with('success', 'You checked out for today');
            } elseif ($latestDate->check_out_timestamp !== null) {
                return back()->with('error', 'Denied! You\'ve check out for the day');
            }
        }

        return back()->with('error', 'You haven\'t checked in');
    }


    public function requestSupervisorApproval(Request $request)
    {
        $alreadyCheckedAttendance = json_decode($this->checkAttendance()->getContent(), true);

        if ($alreadyCheckedAttendance['checked_in']) {
            return response()->json(['status' => 'denied']);
        }


        $user = auth()->user();

        $user->addRequestSupervisorApproval($request->all());

        return response()->json(['status' => 'success']);
    }

    public function checkAttendance()
    {
        $latestDate =  Intern::where('user_id', auth()->id())->latest()->first();

        if ($latestDate) {
            $latest = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latestDate->check_in_timestamp)->format('Y-m-d');

            if ($latest === date('Y-m-d')) {
                return response()->json(['checked_in' => true]);
            } else {
                return response()->json(['checked_in' => false]);
            }
        }

        return response()->json(['checked_in' => false]);
    }


    public function saveResume(User $user)
    {
        if (request()->hasFile('resume')) {
            $fileName = request()->file('resume')->getClientOriginalName();

            request()->file('resume')->storeAs('public/Resumes/'.$user->application->id, $fileName);

            $user->application->resume = 'storage/Resumes/'.$user->application->id.'/'.$fileName;

            $user->application->save();
        }
    }


    public function getScheduledAppointment()
    {
        if (auth()->user()->application->preferred_company && auth()->user()->application->appointment) {
            $appointment = auth()->user()->application->appointment;
        } elseif (auth()->user()->application->default_application && auth()->user()->application->company->appointment) {
            $appointment = auth()->user()->application->appointment;
        } else {
            return response()->json(['appointment' => 'No appointment received']);
        }

        // if($appointment->isNotEmpty())
        //{

        return new StudentAppointmentResource($appointment);
        //  }


      //  return response()->json(['appointment' => 'No appointment received']);
    }
}
