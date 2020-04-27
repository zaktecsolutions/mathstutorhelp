<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizresult extends Model
{
    protected $guarded = [];
    //
    public function quiz()
    {
        // quizresult belongs to quiz
        return $this->belongsTo('App\Quiz');
    }

    public function quizfeedbacks()
    {
        // quiz result has many quiz feedback
        return $this->hasMany('App\Quizfeedback');
    }

    public function digitutor()
    { 
        //quizresult belings to digitutor
        return $this->belongsTo('App\Digitutor');
    }
}
