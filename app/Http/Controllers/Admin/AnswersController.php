<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

/**
 * This control the CRUD for the Answer model
 * Route::resource('question.answers', 'AnswersController')
 *
 */

class AnswersController extends Controller
{
    /**
     * access to registered user
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return view('admin.answers.index')
            ->with([
                'answers' => $question->answers,
                'question' => $question,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question)
    {
        //
        return view('admin.answers.create')->with([
            'question' => $question,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        $answer = $question->answers()->create($this->validatedData());

        if ($answer) {
            $request->session()->flash('success', $answer->id . ' has been inserted');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.question.answers.index', [$question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Answer $answer)
    {

        return view('admin.answers.show')->with([
            'answer' => $answer,
            'question' => $question,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        // //dd($answer)  - check if answer is coming
        return view('admin.answers.edit')->with([
            'answer' => $answer,
            'question' => $question,
        ]); // send the answer you want to edit

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Request $request, Answer $answer)
    {

        $answer->update($this->validatedData());

        if ($answer) {
            $request->session()->flash('success', $answer->id . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.question.answers.index', [$question]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        //
        $answer->delete();

        return redirect()->route('admin.question.answers.index');
    }

    protected function validatedData()
    {
        $reqData =  request()->validate([
            'ans1_body' => 'required| max:120',
            'ans_image' => 'nullable|image | max:2048',
            'ans1_b' => 'nullable| max:20',
            'ans1_a' => 'nullable| max:20',
            'ans2_body' => 'nullable| max:20',
            'ans2_b' => 'nullable| max:20',
            'ans2_a' => 'nullable| max:20',
            'ans3_body' => 'nullable| max:20',
            'ans_explanation' => 'nullable| max:20',
            'ans_correct' => 'nullable| max:20'
        ]);

        if(array_key_exists('ans_image',$reqData))
        {
            $path = '/quiz/answers/';
            $name = Uuid::uuid4() . '.' . request()->file('ans_image')->extension();
            request()->file('ans_image')->storeAs('public'.$path, $name);
            $reqData['ans_image'] = $path.$name;
        }
        return $reqData;
    }
}
