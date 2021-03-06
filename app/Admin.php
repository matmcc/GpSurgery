<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'job_title', 'color'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // Override for function in CanResetPassword.php
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function events()
    {
        return $this->hasMany('App\CalendarEvent');
    }

    public function daysOff()
    {
        return $this->belongsToMany('App\DayOff')->withTimestamps();
    }

    /**
     * Return where job_title == Dr or Nurse
     *
     * @param $query
     * @return mixed
     */
    public function scopeBookable($query)
    {
        return $query->where('job_title', 'dr')->orWhere('job_title', 'nurse');
    }
}
