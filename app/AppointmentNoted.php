<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentNoted extends Model
{
    protected $guarded = ['id'];


    public function application()
    {
        return $this->belongsTo('App\Appointment');
    }

}
