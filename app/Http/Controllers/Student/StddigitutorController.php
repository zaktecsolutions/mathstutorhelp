<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Quizresults;
use App\User;

class StddigitutorController extends Controller
{
    public function __construct()
    {
        /**
         * access to registered user
         */
        $this->middleware('auth');
    }

    public function index()
    {
        /**
         * redirects to the student dashboard
         */
        $digitutor = auth()->user()->digitutor;
        $results = $digitutor->quizresults;
        $user = auth()->user();
        return view('student.stdquiz.digitutor')->with([
            'user' => $user,
            'results' => $results,
        ]);
    }

    public function showdigitutor($id)
    {
        /**
         * returns the digitutor 
         */
        $user = User::find($id);
        $digitutor = $user->digitutor;
        $results = $digitutor->quizresults;
        //return view('tutor.show')->with([
        return view('student.stdquiz.digitutor')->with([
            'user' => $user,
            'results' => $results,
        ]);
    }

    public function result($quiz_id)
    {
        /**
         * returns the results page 
         */
        $user = User::find($quiz_id);
        $digitutor = $user->digitutor;
        $result = $digitutor->quizresults()->where('quiz_id', $quiz_id)->orderBy('created_at', 'DESC')->first();
        // dd($questions);
        return view('student.stdquiz.result')->with([
            'result' => $result,
        ]);
    }
}