<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = ['id'];

    public function scheduleNoted()
    {
        return $this->hasOne('App\AppointmentNoted');
    }


    public function cordinator()
    {
        return $this->belongsTo('App\Cordinator');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function appointmentNoted()
    {
        $this->scheduleNoted()->create([
            
            'student_id' => auth()->id()
        ]);
    }


    public function application()
    {
        return $this->belongsTo('App\InternshipApplication', 'application_id');
    }
    
}
