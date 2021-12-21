<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'check_in_timestamp', 'check_out_timestamp'
    ];

    public function student()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }
}
