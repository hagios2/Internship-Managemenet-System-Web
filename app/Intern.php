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
        return $this->belongsTo(User::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
}
