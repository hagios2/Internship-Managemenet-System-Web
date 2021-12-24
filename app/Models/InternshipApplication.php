<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['started_at'];

    public function student()
    {
        return $this->belongsTo('App\Models\User', 'student_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\Region', 'preferred_company_city');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function approvedProposedApplicaton()
    {
        return $this->hasOne('App\Models\OtherApplicationApproved', 'application_id');
    }

    public function addProposalApproval()
    {
        return $this->approvedProposedApplicaton()->create(['approved' => true,])->id;
    }

    public function appointment()
    {
        return $this->hasOne('App\Models\Appointment', 'application_id');
    }

    public function addAppointment($appointment_data)
    {
        $this->appointment()->create($appointment_data);
    }

    public function confirmedAppCode()
    {
        return $this->hasOne('App\Models\ConfirmedApplicationCode', 'application_id');
    }

    public function addConfirmApplicationCode($code)
    {
        return $this->confirmedAppCode()->create(['code' => $code]);
    }
}
