<?php

namespace App\Http\Controllers\SupervisorAuth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\InternshipApplication;
use App\Models\Supervisor;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *de' => 'required|string|max:5',
     * @var string
     */
    protected $redirectTo = '/supervisor/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('supervisor.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:supervisors',
            'password' => 'required|min:6|confirmed',
            'application_id' => 'integer|nullable',
            'company_id' => 'integer|nullable',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Supervisor
     */
    protected function create(array $data)
    {
        $supervisor = Supervisor::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if(request()->has('company_id'))
        {
            $company = Company::find(request()->company_id);

            $company->confirmedAppCode->update(['supervisor_id' => $supervisor->id]);

        } else if (request()->has('application_id')) {

            $application = InternshipApplication::find(request()->application_id);

            $application->confirmedAppCode->update(['supervisor_id' => $supervisor->id]);

        }

        return $supervisor;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('supervisor.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('supervisor');
    }
}
