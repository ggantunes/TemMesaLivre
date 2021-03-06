<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile', 'userName', 'companyName', 'ctr', 'itr', 'nic', 'cel', 'email_confirmation'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //send email when reset account password
    public function sendPasswordResetNotification($token)
    {        
        $this->notify(new ResetPassword($token));
    }

    //create relationships with locals table
    public function locals(){
        return $this->hasMany('App\Local');
    }
}
