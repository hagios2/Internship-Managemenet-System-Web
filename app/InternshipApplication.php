<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['started_at'];

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

    public function addProposalApproval()
    {
       return $this->approvedProposedApplicaton()->create(['approved' => true,])->id;
    }

    public function appointment()
    {
        return $this->hasOne('App\Appointment', 'application_id');
    }

    public function addAppointment($appointment_data)
    {
        $this->appointment()->create($appointment_data);
    }

    public function confirmedAppCode()
    {
        return $this->hasOne('App\ConfirmedApplicationCode', 'application_id');
    }

    public function addConfirmApplicationCode($code)
    {
       return $this->confirmedAppCode()->create(['code' => $code]);
    }

}
