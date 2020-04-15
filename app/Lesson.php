<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $fillable = [
        'lesson_name', 'lesson_code', 'lesson_desc', 'course_id', 'lesson_ws', 'lesson_body', 'lesson_quiz',
    ];
    //
    public function topic()
    { //topic belong to the course
        return $this->belongTo('App\Topic');
    }

    public function questions()
    {
        // lesson has many questions
        return $this->hasMany('App\Question');
    }
}
