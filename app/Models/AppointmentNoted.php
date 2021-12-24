<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentNoted extends Model
{
    protected $guarded = ['id'];


    public function application()
    {
        return $this->belongsTo('App\Models\Appointment');
    }
}
