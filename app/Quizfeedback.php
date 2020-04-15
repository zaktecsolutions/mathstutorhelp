<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizfeedback extends Model
{
    //
    public function lesson()
    {
        //question belongs to lesson
        return $this->belongsTo('App\Lesson');

    }
    public function answer()
    {
        //question belongs to lesson
        return $this->belongsTo('App\Answer');

    }
    public function quizfeedback()
    {
        //question belongs to lesson
        return $this->belongsTo('App\Quizfeedback');

    }
}
