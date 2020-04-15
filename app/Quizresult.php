<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizresult extends Model
{
    //
    public function quizzes()
    {
        // question has many answers
        return $this->hasMany('App\Quiz');
    }

    public function quizfeedback()
    {
        // question has many answers
        return $this->hasMany('App\Quizfeedback');
    }

    public function digitutor()
    { //User has One digiTutor
        return $this->hasOne('App\Digitutor');
    }
}
