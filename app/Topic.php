<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    protected $guarded = [];

    public function course()
    {
        //Topic belongs to Course
        return $this->belongsTo('App\Course');
    }

    public function lessons()
    {
        // Topic has many Lesson
        return $this->hasMany('App\Lesson');
    }

    public function quizzes()
    {
        // Topic has many Quiz
        return $this->hasMany('App\Quiz')->orderBy('quiz_subtype');
    }

    public function is_complete()
    {
        /**
         *
         */
        $ids = $this->quizzes()->where('quiz_type', 'Topic')->pluck('id');
        return Quizresult::where('digitutor_id', auth()->user()->digitutor->id)
            ->whereIn('quiz_id', $ids)
            ->where('quiz_percent', '>=', 90)->exists();
    }

    public function summary_enabled()
    {
        /**
         *
         */
        $ids = $this->quizzes()->where('quiz_type', 'Topic')->where('quiz_subtype', 'diagnostic')->pluck('id');
        return Quizresult::where('digitutor_id', auth()->user()->digitutor->id)
            ->whereIn('quiz_id', $ids)
            ->exists();
    }
}