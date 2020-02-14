<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['id'];

    public function region()
    {
        
        return $this->belongsTo('App\Region', 'city');
        
    }

    public function application()
    {
        return $this->hasMany('App\InternshipApplication');
    }

    public function approved_application()
    {
        return $this->hasOne('App\ApprovedApplication');
    }

    public function appointment()
    {
        return $this->hasOne('App\Appointment');
    }


    public function addAppointment($appointment_data)
    {
        $this->appointment()->create($appointment_data);
    }

    

}
