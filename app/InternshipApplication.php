<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends Model
{
    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo('App\User', 'student_id');
    }
}
