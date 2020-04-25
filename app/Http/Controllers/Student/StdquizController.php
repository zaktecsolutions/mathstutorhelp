<?php

namespace App\Http\Controllers\Student;
use App\Quiz;
use App\Http\Controllers\Controller;
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

    public function questions($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        return $quiz->questions;
    }

    public function answers(Request $request){
        
    }
}
