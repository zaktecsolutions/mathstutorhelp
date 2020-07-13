<?php

namespace App\Http\Controllers\Digitutor;

use App\Conversation;
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
         
        $user = User::find($id);      //find user
        $digitutor = $user->digitutor;      //find user digitutor 
        $results = $digitutor->quizresults;    //find quizresult 
        $topics = $user->course->topics;
        $topic_ids = $user->course->topics()->pluck('id')->toArray();    //collecting the topic id
        $lessons = Lesson::whereIn('topic_id', $topic_ids)->get();  // collecting all lessons of the course 
        $pending_lessons = [];        //collect the lessons that are not green
        foreach ($lessons as $lesson) {
            if ($lesson->my_status($user) != 'success') {
                $pending_lessons[] = $lesson;
            }
        }
        return view('digitutor.student')->with([
            'user' => $user,             // pass the user   
            'results' => $results,       // pass the quiz result 
            'todos' => $pending_lessons,   // pass the lesson that are not green
            'topics' => $topics
        ]);
    }

    /**
     * access to registered user
     */

    public function result($id)
    {
        $quizResult = Quizresult::find($id);   // find quizresult with the id
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

    public function sendMessage(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $is_student = $user->hasRole('student');
        
        Conversation::create([
            'message' => $request->message,
            'student_id' => $is_student ? $user->id : $request->student_id,
            'tutor_id' => $is_student ? $user->tutor->id : $user->id,
            'topic_id' => $request->topic_id,
            'incoming' => !$is_student
        ]);
        return redirect()->back();
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