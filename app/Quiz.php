<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /*    protected $fillable = [
    'quiz_name', 'quiz_code', 'quiz_desc', 'quiz_type','quiz_body','quiz_level'
    ]; */
    protected $guarded = [];
    //
    public function topic()
    {
        //quiz belongs to course
        return $this->belongsTo('App\Topic');
    }

    public function lesson()
    {
        //quiz belong to lesson
        return $this->belongsTo('App\Lesson');
    }

    public function questions()
    {
        // quiz belongs to many questions
        return $this->belongsToMany('App\Question');
    }

    public function quizresults()
    {
        //quiz belongs to quizresult
        return $this->hasMany('App\Quizresult');
    }

    public function my_result()
    {
        //quiz belongs to quizresult
        return $this->quizresults()->where('digitutor_id', auth()->user()->digitutor->id)->first();
    }

    public function my_status()
    {
        //quiz belongs to quizresult
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
        return $this->quizresults()->where('digitutor_id', auth()->user()->digitutor->id)
            ->where('quiz_percent', '>=', 90)->exists();
    }
}
