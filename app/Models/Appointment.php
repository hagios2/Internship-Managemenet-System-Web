<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function auth;

class Appointment extends Model
{
    protected $guarded = ['id'];

    public function scheduleNoted()
    {
        return $this->hasOne('App\Models\AppointmentNoted');
    }


    public function cordinator()
    {
        return $this->belongsTo('App\Models\Cordinator');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function appointmentNoted()
    {
        $this->scheduleNoted()->create([

            'student_id' => auth()->id()
        ]);
    }


    public function application()
    {
        return $this->belongsTo('App\Models\InternshipApplication', 'application_id');
    }
}
