<?php

namespace App\Http\Controllers\Digitutor;

use App\Http\Controllers\Controller;
use App\Quizresult;
use App\User;

class DigitutorController extends Controller
{
    public function __construct()
    {
        /**
         * access to registered user
         */
        $this->middleware('auth');
    }

    public function view($id)
    {
        /**
         * returns the digitutor 
         */
        $user = User::find($id);
        $digitutor = $user->digitutor;
        $results = $digitutor->quizresults;
        //return view('tutor.show')->with([
        return view('digitutor.student')->with([
            'user' => $user,
            'results' => $results,
        ]);
    }

    public function result($id)
    {
        $quizResult = Quizresult::find($id);
        return view('digitutor.quiz-result')->with([
            'result' => $quizResult
        ]);
    }
}