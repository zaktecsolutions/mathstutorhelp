<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
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
        $this->validate($request, [
            'ans_image' => 'required| max:120',
            'ans_body' => 'required| max:120',
            'ans_explanation' => 'required| max:120',
            'ans_correct' => 'required',
        ]);
        $answer = answer::create([
            'ans_image' => $request->ans_image,
            'ans_body' => $request->ans_body,
            'ans_explanation' => $request->ans_explanation,
            'question_id' => $question->id,
            'ans_correct' => $request->ans_correct,
        ]);

        if ($answer->save()) {
            $request->session()->flash('success', $answer->answer_body . ' has been updated');
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
        //
        // return 'User index page';
        // $answers = answer::all();gets all the answers
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
        //
        $this->validate($request, [
            'ans_image' => 'required| max:120',
            'ans_body' => 'required| max:120',
            'ans_explanation' => 'required| max:120',
            'ans_correct' => 'required',
        ]);
        $success = $answer->update([
            'ans_image' => $request->ans_image,
            'ans_body' => $request->ans_body,
            'ans_explanation' => $request->ans_explanation,
            'ans_correct' => $request->ans_correct,
            'question_id' => $question->id,
        ]);
        if ($success) {
            $request->session()->flash('success', $answer->ans_id . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.question.answers.index');
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

  /*   protected function validatedData()
    {
        return request()->validate([
            'course_name' => 'required| max:120',
            'course_code' => 'required| max:120',
            'course_desc' => 'required| max:120',
            'course_level' => 'required| max:120',
            'course_image' => 'required| max:120',

        ]);
    }
 */
}
