<?php

namespace App\Http\Controllers\Student;

use App\Digitutor;
use App\Quiz;
use App\Http\Controllers\Controller;
use App\Question;
use App\Quizfeedback;
use App\Quizresult;
use Illuminate\Http\Request;

class StdquizController extends Controller
{
    //
    public function __construct()
    {
        /**
         * access to registered user
         */
        $this->middleware('auth');
    }

    /**
     * redirects to the student dashboard
     */

    public function show($id)
    {
        $quiz = Quiz::find($id);
        // dd($questions);
        return view('student.stdquiz.quiz')->with([
            'quiz' => $quiz
        ]);
    }

    public function result($quiz_id)
    {
        $digitutor = auth()->user()->digitutor;
        $result = $digitutor->quizresults()->where('quiz_id',$quiz_id)->orderBy('created_at', 'DESC')->first();
        // dd($questions);
        return view('student.stdquiz.result')->with([
            'result' => $result
        ]);
    }

    public function questions($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        return $quiz->questions;
    }

    public function answers(Request $request, $quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        $result = $quiz->my_result();
        if(!empty($result)){
            $result->delete();
        }
        $result = Quizresult::create([
            'quiz_id' => $quiz->id,
            'digitutor_id' => auth()->user()->digitutor->id,
            'quiz_percent' => 0,
            'grade' => 0
        ]);
        $totalMarks = 0;
        $totalGrades = 0;
        foreach ($request->answers as $answer) {
            $question = Question::find($answer["question_id"]);
            $rightAnswer = $question->answers()->where('ans_correct', true)->first();
            $status = 0;
            /** Skipped */
            if (!empty($answer["answer"])) {
                if ($rightAnswer->ans_body == $answer["answer"]) {
                    $status = 1; /*"correct"*/
                    $totalMarks += $question->question_mark;
                    $totalGrades += $question->question_grade;
                } else {
                    $status = -1; /* "incorrect"*/
                }
            }

            Quizfeedback::create([
                'quizresult_id' => $result->id,
                'question_id' => $question->id,
                'answer_id' => null,
                'answer' => $answer["answer"],
                'status' => $status,
                'user_id' => auth()->user()->id
            ]);
        }
        $allMarks = $quiz->questions->sum('question_mark');
        $allGrades = $quiz->questions->sum('question_grade');
        $result->update([
            'quiz_percent' => $totalMarks / $allMarks * 100,
            'grade' => $totalGrades / $allGrades * 100
        ]);
        return $result;
    }
}
