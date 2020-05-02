<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'course_id',
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

    public function course()
    {
        //courses belong to user
        return $this->belongsTo('App\Course');
    }

    public function digitutor()
    {
        //User has One digiTutor
        return $this->hasOne('App\Digitutor');
    }

    public function tutor()
    {
        return $this->belongsTo('App\User', 'tutor_id', 'id');
    }

    public function students()
    {
        return $this->hasMany('App\User', 'tutor_id', 'id');
    }
}
