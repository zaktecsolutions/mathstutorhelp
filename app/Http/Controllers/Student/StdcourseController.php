<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Controllers\Controller;

class StdcourseController extends Controller
{
    /**
     * access to registered user
     */
    public function __construct()
    {

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
            'topics' => $topics,

        ]);
    }
}