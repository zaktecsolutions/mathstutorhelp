<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    protected $guarded = [];

    public function topic()
    {
        //Quiz belongs to Topic
        return $this->belongsTo('App\Topic');
    }

    public function lesson()
    {
        //Quiz belongs to Lesson
        return $this->belongsTo('App\Lesson');
    }

    public function questions()
    {
        // Quiz belongs to Many Question
        return $this->belongsToMany('App\Question');
    }

    public function quizresults()
    {
        //Quiz belongs to Many Quizresult
        return $this->hasMany('App\Quizresult');
    }

    public function my_result()
    {
        /**
         * retunrs the admin dashboard.
         *
         */
        return $this->quizresults()->where('digitutor_id', auth()->user()->digitutor->id)->first();
    }

    public function my_status()
    {
        /**
         * retunrs the admin dashboard.
         *
         */
        $result = $this->my_result();
        if ($result == null) {
            return 'danger';
        }
        if ($result->quiz_percent > 90) {
            return 'success';
        } else if ($result->quiz_percent > 80) {
            return 'warning';
        } else {
            return 'danger';
        }
    }

    public function is_complete()
    {
        /**
         * retunrs the admin dashboard.
         *
         */
        return $this->quizresults()->where('digitutor_id', auth()->user()->digitutor->id)
            ->where('quiz_percent', '>=', 90)->exists();
    }
}