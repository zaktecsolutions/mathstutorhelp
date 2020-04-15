<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizresult extends Model
{
    //
    public function quiz()
    {
        // question has many answers
        return $this->belongsTo('App\Quiz');
    }

    public function quizfeedback()
    {
        // question has many answers
        return $this->hasMany('App\Quizfeedback');
    }

    public function digitutor()
    { //User has One digiTutor
        return $this->belongsTo('App\Digitutor');
    }
}
