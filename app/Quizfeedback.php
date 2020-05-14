<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizfeedback extends Model
{
    protected $guarded = [];
    //
    public function question()
    {
        //Quizfeedback belongs to Question
        return $this->belongsTo('App\Question');

    }
    public function answer()
    {
        //Quizfeedback belongs to Answer
        return $this->belongsTo('App\Answer');
    }

    public function quizresult()
    {
        //Quizfeedback belongs to Quizresult
        return $this->belongsTo('App\Quizresult');
    }
}