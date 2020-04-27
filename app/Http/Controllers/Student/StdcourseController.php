<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Topic;
use App\Course;
class StdcourseController extends Controller
{
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
        $user = auth()->user();
       $topics = auth()->user()->course->topics;
       
        return view('student.stdtopic.course')->with([
            'user' => $user,
            'topics'=> $topics
            
        ]);
    }
}
