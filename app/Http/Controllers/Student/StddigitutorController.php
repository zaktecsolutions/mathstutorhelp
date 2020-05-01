<?php

namespace App\Http\Controllers\Student;
use App\Quizresults;
use App\Quiz;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StddigitutorController extends Controller
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
        $digitutor = auth()->user()->digitutor;
        $results = $digitutor->quizresults;
        $user = auth()->user();
        return view('student.stdquiz.digitutor')->with([
            'user' => $user,
            'results' => $results
        ]);

        
    }

    public function showdigitutor($id)
    {
        $user = User::find($id);
        $digitutor = $user->digitutor;
         $results = $digitutor->quizresults;
        //return view('tutor.show')->with([
            return view('student.stdquiz.digitutor')->with([
            'user' => $user,
            'results' => $results
        ]);
    }
}