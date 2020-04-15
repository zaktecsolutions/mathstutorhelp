<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name',  'course_code', 'course_desc', 'course_level', 'course_image'
    ];

    public function users()
    {
        // course has many users 
        return $this->hasMany('App\User');
    }


    public function topics()
    {
        // courses has many topic
        return $this->hasMany('App\Topic');
    }


}
