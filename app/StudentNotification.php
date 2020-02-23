<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentNotification extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['read_at'];


    public function student()
    {
        return $this->belongsTo('App\User');
    }
}
