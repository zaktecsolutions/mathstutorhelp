<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizresult extends Model
{
    protected $guarded = [];
    //
    public function quiz()
    {
        // Quizresult belongs to Quiz
        return $this->belongsTo('App\Quiz');
    }

    public function quizfeedbacks()
    {
        // Quizresult belongs to Quizfeedback
        return $this->hasMany('App\Quizfeedback');
    }

    public function digitutor()
    {
        //Quizresult belongs to Digitutor
        return $this->belongsTo('App\Digitutor');
    }
}