<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    public function course()
    {
        //exam belongs to course
        return $this->belongsTo('App\Course');

    }

    public function questions()
    {
        // exam has many questions 
        return $this->hasMany('App\Question');
    }
}
