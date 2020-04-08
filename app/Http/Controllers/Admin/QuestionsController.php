<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function __construct()
    {
        /**
         * access to registered user
         */
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'User index page';
        $questions = question::all(); //gets all the questions
        //   dd($questions);
        return view('admin.questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question_name' => 'required| max:120',
            'question_body' => 'required| max:120',
            'question_image' => 'required| max:120',
            'ans_body' => 'required| max:120',
            'ans_explanation' => 'required| max:120',
        ]);

        $question = new question;
        $question->question_name = $request->question_name;
        $question->question_body = $request->question_body;
        $question->question_image = $request->question_image;
        $question->ans_body = $request->ans_body;
        $question->ans_explanation = $request->ans_explanation;

        if ($question->save()) {$request->session()->flash('success', $question->question_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        // return 'User index page';
        $questions = question::all(); //gets all the questions
        return view('admin.questions.show')->with('questions', $questions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //dd($question)  - check if question is coming
        $questions = question::all(); //get all the questions
        return view('admin.questions.edit')->with(['question' => $question, // send the question you want to edit
            // 'questions' => $questions, // send all the questions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $this->validate($request, [
            'question_name' => 'required| max:120',
            'question_body' => 'required| max:120',
            'question_image' => 'required| max:120',
            'ans_body' => 'required| max:120',
            'ans_explanation' => 'required| max:120',
        ]);
        $question->question_name = $request->question_name;
        $question->question_body = $request->question_body;
        $question->question_image = $request->question_image;
        $question->ans_body = $request->ans_body;
        $question->ans_explanation = $request->ans_explanation;

        if ($question->save()) {$request->session()->flash('success', $question->question_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.questions.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('admin.questions.index');
    }
}
