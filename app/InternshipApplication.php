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

    public function approvedProposedApplicaton()
    {
        return $this->hasOne('App\OtherApplicationApproved', 'application_id');
    }

    public function appointment()
    {
        return $this->hasMany('App\Appointment', 'application_id');
    }
}
