<?php

namespace App\Http\Controllers\Student;
use App\Quiz;
use App\Http\Controllers\Controller;

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
       // dd($quiz);
        $questions = $quiz->questions;
       // dd($questions);
        return view('student.stdquiz.quiz')->with([
            'quiz' => $quiz,
            'questions' => $questions,
        ]);
    }
}
