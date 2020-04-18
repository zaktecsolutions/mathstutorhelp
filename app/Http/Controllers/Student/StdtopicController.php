<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Topic;

class StdtopicController extends Controller
{
    public function __construct()
    {
        /**
         * access to registered user
         */
        $this->middleware('auth');
    }

    public function show($id)
    {
        $topic = Topic::find($id);
        return view('student.stdtopic.topic')->with([
            'topic' => $topic
        ]);
    }
}
