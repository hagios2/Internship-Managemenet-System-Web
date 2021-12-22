<?php

namespace App\Models;

use App\Notifications\SupervisorResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Supervisor extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
        $this->notify(new SupervisorResetPassword($token));
    }


    public function internsApplication()
    {
        return $this->hasOne('App\Models\ConfirmedApplicationCode');
    }

    public function assessment()
    {
        return $this->hasMany('App\Models\Assessment');
    }

    public function addStudentAssessment($studentAssessmenst)
    {
        $this->assessment()->create($studentAssessmenst);
    }

}
