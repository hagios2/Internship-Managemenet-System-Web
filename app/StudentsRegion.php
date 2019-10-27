<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsRegion extends Model
{
    protected $guarded = ['id'];

    public function student()
    {

        return $this->belongsTo('App\User', 'student_id');
    }

}
