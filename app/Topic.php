<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    public function course()
    {     //topics belong to the course
        return $this->belongTo('App\Course');
    }

    public function questions()
    {
        //topic belongs to many questions
        return $this->belongsToMany('App\Question');

    }

    public function lessons()
    {
        // topic has many lessons
        return $this->hasMany('App\Lesson');
    }
}
