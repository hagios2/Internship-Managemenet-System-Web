<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    
    public function company()
    {
        return $this->hasMany('App\Models\Company', 'city');
        
    }

    
}
