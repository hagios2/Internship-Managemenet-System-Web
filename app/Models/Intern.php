<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'check_in_timestamp', 'check_out_timestamp'
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Models\Supervisor');
    }
}
