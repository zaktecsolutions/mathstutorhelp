<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /* protected $fillable = [
        'topic_name', 'topic_code', 'topic_desc', 'topic_les_num', 'topic_diagnostic_quiz',
         'topic_summary_quiz'
    ]; */
    protected $guarded = [];

    //
    public function course()
    {     //topics belong to the course
        return $this->belongsTo('App\Course');
    }

    public function lessons()
    {
        // topic has many lessons
        return $this->hasMany('App\Lesson');
    }

    public function quizzes()
    {
        // topic has many quizzes
        return $this->hasMany('App\Quiz')->orderBy('quiz_subtype');
    }

    public function is_complete()
    {
        $ids = $this->quizzes()->where('quiz_type', 'Topic')->pluck('id');
        return Quizresult::where('digitutor_id', auth()->user()->digitutor->id)
            ->whereIn('quiz_id', $ids)
            ->where('quiz_percent', '>=', 90)->exists();
    }

    public function summary_enabled()
    {
        $ids = $this->quizzes()->where('quiz_type', 'Topic')->where('quiz_subtype', 'diagnostic')->pluck('id');
        return Quizresult::where('digitutor_id', auth()->user()->digitutor->id)
            ->whereIn('quiz_id', $ids)
            ->exists();
    }
}
