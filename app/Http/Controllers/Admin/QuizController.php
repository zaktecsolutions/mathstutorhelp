<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Quiz;
use App\Topic;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function __construct()
    {
        /**
         * access to registered user
         */
        $this->middleware('auth');
    }

    private function getRouteData(Course $course, Topic $topic, Lesson $lesson)
    {
        if ($lesson->id != null) {
            $routePrefix = 'admin.course.topic.lesson.';
            $routeParams = ['course' => $course, 'topic' => $topic, 'lesson' => $lesson];
        } else if ($topic->id != null) {
            $routePrefix = 'admin.course.topic.';
            $routeParams = ['course' => $course, 'topic' => $topic];
        } else if ($course->id != null) {
            $routePrefix = 'admin.course.';
            $routeParams = ['course' => $course];
        }

        return (object)[
            'routePrefix' => $routePrefix,
            'routeParams' => $routeParams
        ];
    }

    public function index(Course $course, Topic $topic, Lesson $lesson)
    {
        $quizzes = collect([]);
        if ($lesson->id != null) {
            $quizzes = $lesson->quizzes;
        } else if ($topic->id != null) {
            $quizzes = $topic->quizzes;
        } else if ($course->id != null) {
            $quizzes = $course->quizzes;
        }

        $routeData = $this->getRouteData($course, $topic, $lesson);

        return view('admin.quiz.index', compact('routeData', 'quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course, Topic $topic, Lesson $lesson)
    {
        //
        $routeData = $this->getRouteData($course, $topic, $lesson);

        return view('admin.quiz.create', compact('routeData', 'course', 'topic', 'lesson'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course, Topic $topic, Lesson $lesson)
    {
        //
        $quiz = Quiz::create($this->validatedData());
        $routeData = $this->getRouteData($course, $topic, $lesson);
        if ($quiz) {
            $request->session()->flash('success', $quiz->quiz_name . ' has been inserted');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route($request->routePrefix . 'quizzes.index', $routeData->routeParams);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Topic $topic, Lesson $lesson, Quiz $quiz)
    {
        $routeData = $this->getRouteData($course, $topic, $lesson);
        $routeData->routeParams["quiz"] = $quiz;
        return view('admin.quiz.show')->with('quiz', $quiz)->with('routeData', $routeData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Topic $topic, Lesson $lesson, Quiz $quiz)
    {
        $routeData = $this->getRouteData($course, $topic, $lesson);
        $routeData->routeParams['quiz'] = $quiz;
        return view('admin.quiz.edit')->with([
            'quiz' => $quiz, // send the quiz you want to edit
            'routeData' => $routeData,
            'topic' => $topic,
            'lesson' => $lesson,
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Topic $topic, Lesson $lesson, Quiz $quiz)
    {
        $quiz->update($this->validatedData());
        $routeData = $this->getRouteData($course, $topic, $lesson);
        if ($quiz) {
            $request->session()->flash('success', $quiz->quiz_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }
        return redirect()->route($request->routePrefix . 'quizzes.index', $routeData->routeParams);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course, Topic $topic, Lesson $lesson, Quiz $quiz)
    {
        //
        $routeData = $this->getRouteData($course, $topic, $lesson);
        $quiz->delete();

        return redirect()->route($request->routePrefix . 'quizzes.index', $routeData->routeParams);
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
            'topic_id' => 'nullable',
            'course_id' => 'nullable',
            'lesson_id' => 'nullable',
        ]);
    }
}
