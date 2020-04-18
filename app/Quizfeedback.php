<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizfeedback extends Model
{
    //
    public function question()
    {
        //question belongs to lesson
        return $this->belongsTo('App\Question');

    }
    public function answer()
    {
        //question belongs to lesson
        return $this->belongsTo('App\Answer');
    }

    public function quizresult()
    {
        //quizfeedback belongs to quizresult
        return $this->belongsTo('App\Quizresult');
    }
}
