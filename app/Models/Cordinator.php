<?php

namespace App\Models;

use App\Notifications\CordinatorResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cordinator extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'device_token', 'department_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CordinatorResetPassword($token));
    }

    public function appointment()
    {
        return $this->hasMany('App\Models\Appointment');
    }


    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
