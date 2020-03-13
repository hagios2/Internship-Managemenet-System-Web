<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $guarded = ['id'];


    public function student()
    {
        return $this->belongsTo('App\User', 'student_id');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }


    public function cordinator()
    {
        return $this->belongsTo('App\Cordinator');
    }




    
}
