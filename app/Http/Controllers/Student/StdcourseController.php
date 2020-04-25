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
      /*   $user_id = auth()->user()->user->id;
        $topics = Topic::find($user_id); */
        $user = auth()->user();
       $topics = Topic::all(); //gets all the topics
     // $course = auth()->user()->course_name;
      //dd($course);
      // $topics = auth()->user()->course()->topic_name;
       
        return view('student.stdcourse.course')->with([
            'user' => $user,
            'topics'=> $topics
        ]);
    }
}
