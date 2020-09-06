<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use App\Quiz;
use App\Topic;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class QuestionsController extends Controller
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
    public function index()
    {
        $topics = Topic::all();
        $quizes = Quiz::all();
        // return 'User index page';
        $questions = question::all(); //gets all the questions
        //   dd($questions);
        return view('admin.questions.index')->with(compact('questions', 'topics', 'quizes'));
    }

    public function filter(Request $request)
    {
        $query = Question::query();
        if ($request->has('topic_id') && !empty($request->topic_id)) {
            $topic_id = $request->topic_id;
            $query->whereHas('lesson', function ($q) use ($topic_id) {
                $q->where('topic_id', $topic_id);
            });
        }
        if ($request->has('quiz_id') && !empty($request->quiz_id)) {
            $quiz_id = $request->quiz_id;
            $query->whereHas('quizzes', function ($q) use ($quiz_id) {
                $q->where('quizzes.id', $quiz_id);
            });
        }
        return view('admin.questions.question-list')->with('questions', $query->get());
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

        if ($question) {
            $request->session()->flash('success', $question->question_name . ' has been inserted');
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


        if ($question) {
            $request->session()->flash('success', $question->question_name . ' has been updated');
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
        $reqData =  request()->validate([
            'question_name' => 'required| max:120',
            'question_body' => 'required| max:120',
            'question_image' => 'nullable| image | max:2048',
            'question_mark' => 'required| numeric |min:1|max:9',
            'question_grade' => 'required| numeric |min:1|max:9',
            'question_type' => 'nullable| max:20',
        ]);

        if (array_key_exists('question_image', $reqData)) {
            $path = '/quiz/questions/';
            $name = Uuid::uuid4() . '.' . request()->file('question_image')->extension();
            request()->file('question_image')->storeAs('public' . $path, $name);
            $reqData['question_image'] = $path . $name;
        }
        return $reqData;
    }
}
