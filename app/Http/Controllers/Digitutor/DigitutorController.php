<?php

namespace App\Http\Controllers\Digitutor;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Quizfeedback;
use App\Quizresult;
use App\User;
use App\Digitutor;
use Illuminate\Http\Request;

class DigitutorController extends Controller
{
    /**
     * access to registered user
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * access to registered user
     */
    public function view($id)
    {

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
            'todos' => $pending_lessons,
        ]);
    }

    /**
     * access to registered user
     */

    public function result($id)
    {
        $quizResult = Quizresult::find($id);
        return view('digitutor.quiz-result')->with([
            'result' => $quizResult,
        ]);
    }

    /**
     * access to registered user
     */
    public function markAnswer(Request $request)
    {

        $feedback = Quizfeedback::find($request->feedback_id);
        $feedback->status = $request->status;
        $feedback->save();
        return $feedback;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Digitutor $digitutor)
    {
        return view('digitutor.show')->with([
            'digitutor' => $digitutor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Digitutor $digitutor)
    {
        //
        return view('digitutor.edit')->with([
            'digitutor' => $digitutor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


}