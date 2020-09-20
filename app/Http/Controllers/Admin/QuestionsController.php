<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Lesson;
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
    public function index(Course $course)
    {
        $topics = $course->topics;

        $query = Quiz::where(function ($q) use ($course) {
            $q->where('quiz_type', 'Course')->where('course_id', $course->id);
        });

        $query->orWhere(function ($q) use ($course) {
            $q->whereHas('topic', function ($sq) use ($course) {
                $sq->where('course_id', $course->id);
            });
        });

        $quizes = $query->get();

        $lessons = Lesson::whereHas('topic', function ($q) use ($course) {
            $q->where('course_id', $course->id);
        })->get();
        $questions = Question::whereHas('lesson', function ($q) use ($course) {
            $q->whereHas('topic', function ($sq) use ($course) {
                $sq->where('course_id', $course->id);
            });
        })->get();
        return view('admin.questions.index')->with(compact('course', 'questions', 'topics', 'quizes', 'lessons'));
    }

    public function filter(Request $request)
    {
        $query = Question::query();
        $course_id = $request->course_id;
        $course = Course::find($course_id);
        $query->whereHas('lesson', function ($q) use ($course_id) {
            $q->whereHas('topic', function ($sq) use ($course_id) {
                $sq->where('course_id', $course_id);
            });
        });

        if ($request->has('topic_id') && !empty($request->topic_id)) {
            $topic_id = $request->topic_id;
            $query->whereHas('lesson', function ($q) use ($topic_id) {
                $q->where('topic_id', $topic_id);
            });
        }

        if ($request->has('lesson_id') && !empty($request->lesson_id)) {
            $query->where('lesson_id', $request->lesson_id);
        }

        if ($request->has('quiz_id') && !empty($request->quiz_id)) {
            $quiz_id = $request->quiz_id;
            $query->whereHas('quizzes', function ($q) use ($quiz_id) {
                $q->where('quizzes.id', $quiz_id);
            });
        }
        return view('admin.questions.question-list')->with('questions', $query->get())->with('course', $course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $lessons = Lesson::whereHas('topic', function ($q) use ($course) {
            $q->where('course_id', $course->id);
        })->get();
        return view('admin.questions.create', compact('course', 'lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        //
        $question = Question::create($this->validatedData());

        if ($question) {
            $request->session()->flash('success', $question->question_name . ' has been inserted');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }
        return redirect()->route('admin.course.questions.index', ['course' => $course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Course $course)
    {
        return view('admin.questions.show')->with('question', $question)->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Question $question)
    {
        $lessons = Lesson::whereHas('topic', function ($q) use ($course) {
            $q->where('course_id', $course->id);
        })->get();
        return view('admin.questions.edit')->with([
            'question' => $question,
            'course' => $course,
            'lessons' => $lessons
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Question $question)
    {
        $question->update($this->validatedData());

        if ($question) {
            $request->session()->flash('success', $question->question_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.course.questions.index', ['course' => $course]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Question $question)
    {
        $question->delete();

        return redirect()->route('admin.course.questions.index', ['course' => $course]);
    }
    protected function validatedData()
    {
        $reqData =  request()->validate([
            'lesson_id' => 'required',
            'question_name' => 'required| max:120',
            'question_code' => 'required| max:120',
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
