<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $guarded = ['id'];


    public function student()
    {
        return $this->belongsTo('App\Models\User', 'student_id');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Models\Supervisor');
    }


    public function cordinator()
    {
        return $this->belongsTo('App\Models\Cordinator');
    }




    
}
