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

    public function quiz_questions($type = 'diagnostic')
    {
        $quiz = $this->topic->quizzes()->where('quiz_subtype', $type)->first();
        return $quiz->questions()->where('lesson_id', $this->id);
    }

    public function my_status($type = 'diagnostic')
    {
        $questions = $this->quiz_questions($type)->get();
        $total = 0;
        $right = 0;
        foreach ($questions as $question) {
            $total++;
            $answer = $question->my_answer();
            if ($answer != null && $answer->status == 1) {
                $right++;
            }
        }
        if ($total == 0) return 'success';
        $percentage = ($right / $total * 100);
        if ($percentage > 66) {
            return 'success';
        } else if ($percentage > 33) {
            return 'warning';
        } else {
            return 'danger';
        }
    }

    public function quizzes()
    {
        // lesson has many questions
        return $this->hasMany('App\Quiz');
    }

    public function is_complete()
    {
        $ids = $this->quizzes()->where('quiz_type', 'Lesson')->pluck('id');
        return Quizresult::where('digitutor_id', auth()->user()->digitutor->id)
            ->whereIn('quiz_id', $ids)
            ->where('quiz_percent', '>=', 90)->exists();
    }
}
