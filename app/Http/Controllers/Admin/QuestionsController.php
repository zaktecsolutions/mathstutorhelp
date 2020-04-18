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
        //
        $question = question::create($this->validatedData());

        if ($question) {$request->session()->flash('success', $question->question_name . ' has been inserted');
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

        // return 'User index page';
        //  $questions = question::all(); //gets all the questions
        return view('admin.questions.show')->with('question', $question);
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
        $question->update($this->validatedData());

        if ($question) {$request->session()->flash('success', $question->question_name . ' has been updated');
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
    protected function validatedData()
    {
        return request()->validate([
            'question_name' => 'required| max:120',
            'question_body' => 'required| max:120',
            'question_image' => 'required| max:120',
            'question_mark' => 'required| numeric|min:1|max:9',
            'question_grade' => 'required| numeric|min:1|max:9',
            'question_type' => 'required| max:120',

        ]);
    }
}
