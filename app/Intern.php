<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    protected $quarded = ['id'];

    protected $dates = ['started_at'];

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
