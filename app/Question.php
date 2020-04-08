<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    public function topics()
    {
        //topic belongs to many questions
        return $this->belongsToMany('App\Topic');

    }

    public function exam()
    {
        //questions belongs to exams
        return $this->belongsTo('App\Exam');

    }

    public function lesson()
    {
        //question belongs to lesson
        return $this->belongsTo('App\Lesson');

    }
}
