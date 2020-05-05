<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /*  protected $fillable = [
        'question_name', 'question_body', 'question_image', 'question_mark', 'question_grade', 'question_type', 'question_category',
    ]; */
    protected $guarded = [];
    //

    public function quizzes()
    {
        //quizzes belong to many questions
        return $this->belongsToMany('App\Quiz');
    }

    public function lesson()
    {
        //question belongs to lesson
        return $this->belongsTo('App\Lesson');
    }

    public function answers()
    {
        // question has many answers
        return $this->hasMany('App\Answer');
    }

    public function right_answer()
    {
        // question has many answers
        return $this->answers()->where('ans_correct', 1)->first();
    }

    public function my_answer()
    {
        return $this->quizfeedbacks()->where('user_id', auth()->user()->id)->first();
    }

    public function quizfeedbacks()
    {
        // topic has many lessons
        return $this->hasMany('App\Quizfeedback');
    }
}
