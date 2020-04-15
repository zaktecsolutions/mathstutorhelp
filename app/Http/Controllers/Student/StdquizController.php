<?php

namespace App\Http\Controllers\Student;

use App\Answer;
use App\Course;
use App\Http\Controllers\Controller;
use App\Question;
use App\Topic;

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
    public function index()
    {
        $questions = Question::all(); //gets all the questions
        $answers = Answer::all(); //gets all the answers
        $quiz = auth()->user()->course()->topic()->topic_quiz;  // get the name of the quiz
        $user = auth()->user();
        return view('student.stdquiz.quiz')->with([
            'user' => $user,
            'quiz' => $quiz,
            'questions' => $questions,
            'answers' => $answers,
        ]);
    }
}
