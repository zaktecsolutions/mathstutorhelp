<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $guarded = [];

    public function topic()
    {
        //    Lesson belongs to Topic
        return $this->belongsTo('App\Topic');
    }

    public function questions()
    {
        // Lesson has many Question 
        return $this->hasMany('App\Question');
    }

    public function quizzes()
    {
        // Lesson has many Quiz
        return $this->hasMany('App\Quiz');
    }

    public function quiz_questions($type = 'diagnostic')
    {
        /**
         * retunrs the admin dashboard.
         *
         */
        $quiz = $this->topic->quizzes()->where('quiz_subtype', $type)->first();
        if (!empty($quiz)) {
            return $quiz->questions()->where('lesson_id', $this->id);
        } else {
            return Question::where('id', '<', 0);
        }
    }

    public function my_status($user, $type = 'diagnostic')
    {
        /**
         * return the status of the lesson.
         *
         */
        $questions = $this->quiz_questions($type)->get();
        $total = 0;
        $right = 0;
        foreach ($questions as $question) {
            $total++;
            $answer = $question->my_answer($user);
            if ($answer != null && $answer->status == 1) {
                $right++;
            }
        }
        if ($total == 0) {
            return 'success';
        }

        $percentage = ($right / $total * 100);
        if ($percentage > 66) {
            return 'success';
        } else if ($percentage > 33) {
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
        $ids = $this->quizzes()->where('quiz_type', 'Lesson')->pluck('id');
        return Quizresult::where('digitutor_id', auth()->user()->digitutor->id)
            ->whereIn('quiz_id', $ids)
            ->where('quiz_percent', '>=', 90)->exists();
    }
}
