<?php

namespace App\Http\Controllers\Digitutor;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Quizfeedback;
use App\Quizresult;
use App\User;
use Illuminate\Http\Request;

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
        $topic_ids = $user->course->topics()->pluck('id')->toArray();
        $lessons = Lesson::whereIn('topic_id', $topic_ids)->get();
        $pending_lessons = [];
        foreach ($lessons as $lesson) {
            if ($lesson->my_status($user) != 'success') {
                $pending_lessons[] = $lesson;
            }
        }
        //return view('tutor.show')->with([
        return view('digitutor.student')->with([
            'user' => $user,
            'results' => $results,
            'todos' => $pending_lessons
        ]);
    }

    public function result($id)
    {
        $quizResult = Quizresult::find($id);
        return view('digitutor.quiz-result')->with([
            'result' => $quizResult
        ]);
    }

    public function markAnswer(Request $request)
    {
        $feedback = Quizfeedback::find($request->feedback_id);
        $feedback->status = $request->status;
        $feedback->save();
        return $feedback;
    }

}
