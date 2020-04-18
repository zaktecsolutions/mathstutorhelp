<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // protected $fillable = [
    //     'course_name', 'course_code', 'course_desc', 'course_level', 'course_image',
    // ];

    protected $guarded = [];

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
    public function quizzes()
    {
        // courses has many quizzes
        return $this->hasMany('App\Quiz');
    }


}
