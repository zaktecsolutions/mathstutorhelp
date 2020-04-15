<?php

namespace App\Http\Controllers\Student;

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
      //  $topics = Topic::all(); //gets all the topics
       // $topics = auth()->user()->course_name-> Topic::all();
        $user = auth()->user();
        return view('student.stddigitutor.digitutor')->with([
            'user' => $user,
            //'topics'=> $topics
        ]);
    }
}
