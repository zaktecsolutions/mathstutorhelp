<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //

    public function topic()
    {     //topic belong to the course
        return $this->belongTo('App\Topic');
    }

    public function questions()
    {
        // lesson has many questions
        return $this->hasMany('App\Question');
    }
}
