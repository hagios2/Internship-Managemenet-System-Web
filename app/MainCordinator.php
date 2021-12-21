<?php

namespace App;


use App\Notifications\MainCordinatorResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class MainCordinator extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'device_token'
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
        $this->notify(new MainCordinatorResetPassword($token));
    }

    public function message(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Message');
    }

    public function addMessage($message): \Illuminate\Database\Eloquent\Model
    {
        return $this->message()->create($message);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims(): array
    {
        return [];
    }

}
