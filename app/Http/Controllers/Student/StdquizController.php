<?php

namespace App\Http\Controllers\Student;

use App\answer;
use App\Digitutor;
use App\Http\Controllers\Controller;
use App\Question;
use App\Quiz;
use App\Quizfeedback;
use App\Quizresult;
use Illuminate\Http\Request;

class StdquizController extends Controller
{
    /**
     * access to registered user
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Displays the student quiz
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);
        return view('student.stdquiz.quiz')->with([
            'quiz' => $quiz,
        ]);
    }
    /**
     * Displays the student quiz result
     */
    public function result($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        $tutoranswers = Answer::find($quiz_id);
        $digitutor = auth()->user()->digitutor; // current user didgitutor
        $result = $digitutor->quizresults()->where('quiz_id', $quiz_id)->orderBy('created_at', 'DESC')->first();
        return view('student.stdquiz.result')->with([
            'result' => $result,
            'tutoranswers' => $tutoranswers,
        ]);
    }
    /**
     * Send the quiz questions to the Vue
     */
    public function questions($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        foreach ($quiz->questions as &$question) {
            $right_answer = $question->right_answer();
            $question->format = [
                [$right_answer->ans1_b, $right_answer->ans1_a],
                [$right_answer->ans2_b, $right_answer->ans2_a],
                [$right_answer->ans3_b, $right_answer->ans3_a]
            ];
        }
        return $quiz->questions;
    }
    /**
     * Checks the answers and completes the quiz result table
     */
    public function answers(Request $request, $quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        $result = $quiz->my_result();
        if (!empty($result)) {
            $result->delete();
        }
        $result = Quizresult::create([
            'quiz_id' => $quiz->id,
            'digitutor_id' => auth()->user()->digitutor->id,
            'quiz_percent' => 0,
            'grade' => 0,
        ]);
        $totalMarks = 0;
        $totalGrades = 0;
        foreach ($request->answers as $answer) {
            $question = Question::find($answer["question_id"]);
            $rightAnswer = $question->answers()->where('ans_correct', true)->first();
            $status = 0;
            /** Skipped */
            if (!empty($answer["answer1"])) {
                if (
                    $rightAnswer->ans1_body == $answer["answer1"]
                    && $rightAnswer->ans2_body == $answer["answer2"]
                    && $rightAnswer->ans3_body == $answer["answer3"]
                ) {
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
                'answer1' => $answer["answer1"],
                'answer2' => $answer["answer2"],
                'answer3' => $answer["answer3"],
                'status' => $status,
                'user_id' => auth()->user()->id,
            ]);
        }
        $allMarks = $quiz->questions->sum('question_mark');
        $allGrades = $quiz->questions->sum('question_grade');
        $result->update([
            'quiz_percent' => $totalMarks / $allMarks * 100,
            'grade' => $totalGrades / $allGrades * 100,
        ]);
        return $result;
    }
}
