<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = ['id'];

    public function scheduleNoted()
    {
        return $this->hasMany('App\Appointment');
    }


    public function cordinator()
    {
        return $this->belongsTo('App\Cordinator');
    }


    public function appointmentNoted()
    {
        $this->scheduleNoted->create([
            
            'student_id' => auth()->id()
        ]);
    }


    public function application()
    {
        return $this->belongsTo('App\InternshipApplication', 'appointment_id');
    }
    
}
