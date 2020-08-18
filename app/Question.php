<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    protected $with = ['answers'];

    public function quizzes()
    {
        //Question belongs to many Quiz
        return $this->belongsToMany('App\Quiz');
    }

    public function lesson()
    {
        //Question belongs to Lesson
        return $this->belongsTo('App\Lesson');
    }

    public function answers()
    {
        // Question had many Answer
        return $this->hasMany('App\Answer');
    }

    public function quizfeedbacks()
    {
        // Question has many Quizfeedback
        return $this->hasMany('App\Quizfeedback');
    }

    public function right_answer()
    {
        /**
         * retunrs the admin dashboard.
         *
         */
        return $this->answers()->where('ans_correct', 1)->first();
    }

    public function my_answer($user)
    {
        /**
         * retunrs the admin dashboard.
         *
         */
        return $this->quizfeedbacks()->where('user_id', $user->id)->first();
    }
}
