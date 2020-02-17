<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends Model
{
    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo('App\User', 'student_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Region', 'preferred_company_city');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
        
    }

 /*    public function approved_application()
    {
        return $this->hasOne('App\ApprovedApplication');
    } */

    public function approvedProposedApplicaton()
    {
        return $this->hasOne('App\OtherApplicationApproved', 'application_id');
    }

    public function appointment()
    {
        return $this->hasOne('App\Appointment', 'application_id');
    }

    public function addAppointment($appointment_data)
    {
        $this->appointment()->create($appointment_data);
    }
}
