<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        // user belong to many roles

        return $this->belongsToMany('App\Role');

    }

    public function course()
    { //courses belong to user
        return $this->belongTo('App\Course');
    }

    public function digitutor()
    { //User has One Tutor
        return $this->hasOne('App\Digitutor');
    }

    public function hasAnyRoles($roles)
    {

        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {

        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

}
