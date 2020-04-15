<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // // return 'User index page';
        $answers = answer::all(); //gets all the answers
        //dd($answers);
        return view('admin.answers.index')->with('answers', $answers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.answers.create');
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
            'ans_image' => 'required| max:120',
            'ans_body' => 'required| max:120',
            'ans_explanation' => 'required| max:120',

        ]);
        $answer = answer::create([
            'ans_image' => $request->ans_image,
            'ans_body' => $request->ans_body,
            'ans_explanation' => $request->ans_explanation,

        ]);

        if ($answer->save()) {$request->session()->flash('success', $answer->answer_body . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }
        return redirect()->route('admin.answers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
        // return 'User index page';
        // $answers = answer::all();gets all the answers
        return view('admin.answers.show')->with('answer', $answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        // //dd($answer)  - check if answer is coming
        return view('admin.answers.edit')->with('answer', $answer); // send the answer you want to edit

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
        $this->validate($request, [
            'ans_image' => 'required| max:120',
            'ans_body' => 'required| max:120',
            'ans_explanation' => 'required| max:120',

        ]);
        $success = $answer->update([
            'ans_image' => $request->ans_image,
            'ans_body' => $request->ans_body,
            'ans_explanation' => $request->ans_explanation,

        ]);
        if ($success) {$request->session()->flash('success', $answer->ans_id . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.answers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
        $answer->delete();

        return redirect()->route('admin.answers.index');
    }
}
