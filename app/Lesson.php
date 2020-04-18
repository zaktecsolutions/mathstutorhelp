<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

   /*  protected $fillable = [
        'lesson_name', 'lesson_code', 'lesson_desc', 'course_id', 'lesson_ws', 'lesson_body', 'lesson_quiz',
    ]; */
    protected $guarded = [];

    //
    public function topic()
    { //    lessson belongs to topic
        return $this->belongsTo('App\Topic');
    }

    public function questions()
    {
        // lesson has many questions
        return $this->hasMany('App\Question');
    }

    public function quizzes()
    {
        // lesson has many questions
        return $this->hasMany('App\Quiz');
    }

    public function is_complete()
    {
        $ids = $this->quizzes()->where('quiz_type','Lesson')->pluck('id');
        return Quizresult::where('digitutor_id',auth()->user()->digitutor->id)
        ->whereIn('quiz_id',$ids)
        ->where('quiz_percent','>=',90)->exists();
    }
}
