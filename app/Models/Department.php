<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validate)
 */
class Department extends Model
{
    protected $guarded = ['id'];


    public function program()
    {
        return $this->hasMany('App\Models\Program');
    }
}
