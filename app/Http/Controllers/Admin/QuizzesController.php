<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Quiz;
use Illuminate\Http\Request;

class QuizzesController extends Controller
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
        //
        // return 'User index page';

        $quizzes = quiz::all(); //gets all the quizzes
        //dd($quizzes);
        return view('admin.quizzes.index')->with('quizzes', $quizzes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.quizzes.create');
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
        $quiz = Quiz::create($this->validatedData());

        if ($quiz) {$request->session()->flash('success', $quiz->quiz_name . ' has been inserted');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.quizzes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
        // return 'User index page';
        // $quizzes = quiz::all();gets all the quizzes
        return view('admin.quizzes.show')->with('quiz', $quiz);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
        //dd($quiz)  - check if quiz is coming
        // $quizzes = quiz::all(); //get all the quizzes
        return view('admin.quizzes.edit')->with(['quiz' => $quiz, // send the quiz you want to edit
            // 'quizzes' => $quizzes, // send all the quizzes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $quiz->update($this->validatedData());

        if ($quiz) {$request->session()->flash('success', $quiz->quiz_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }
        return redirect()->route('admin.quizzes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
        $quiz->delete();

        return redirect()->route('admin.quizzes.index');
    }

    protected function validatedData()
    {
        return request()->validate([
            'quiz_name' => 'required| max:120',
            'quiz_code' => 'required| max:120',
            'quiz_desc' => 'required| max:120',
            'quiz_type' => 'required| max:120',
            'quiz_subtype' => 'required| max:120',
            'calculator' => 'required| max:120',
        ]);
    }
}