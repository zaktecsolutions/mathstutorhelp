<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Course;
use App\Topic;
use Illuminate\Http\Request;

class LessonsController extends Controller
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
    public function index(Course $course, Topic $topic)
    {
        // return 'User index page';
        $lessons = lesson::all(); //gets all the lessons
        //  dd($lessons);
        return view('admin.lessons.index')->with([
            'topic' => $topic,
            'lessons' => $topic->lessons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course, Topic $topic)
    {
        //
        return view('admin.lessons.create')->with([
            'topic' => $topic
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course, Topic $topic)
    {
        //
        $lesson = Lesson::create($this->validatedData());

        if ($lesson) {
            $request->session()->flash('success', $lesson->lesson_name . ' has been inserted');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }
        return redirect()->route('admin.course.topic.lessons.index', [
            'course' => $course,
            'topic' => $topic
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Topic $topic, Lesson $lesson)
    {

        // return 'User index page';
        //  $lessons = lesson::all(); gets all the lessons
        return view('admin.lessons.show')->with([
            'topic' => $topic,
            'lesson' => $lesson
        ]);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Topic $topic, Lesson $lesson)
    {
        //dd($lesson)  - check if lesson is coming

        $lessons = lesson::all(); //get all the lessons
        return view('admin.lessons.edit')->with([
            'lesson' => $lesson, // send the lesson you want to edit
            'topic' => $topic, // send all the lessons
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Topic $topic, Lesson $lesson)
    {
        //
        $lesson->update($this->validatedData());

        if ($lesson) {
            $request->session()->flash('success', $lesson->lesson_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.course.topic.lessons.index', [
            'course' => $course,
            'topic' => $topic
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Topic $topic, Lesson $lesson)
    {
        //
        $lesson->delete();

        return redirect()->route('admin.lessons.index', [
            'course' => $course,
            'topic' => $topic
        ]);
    }
    protected function validatedData()
    {
        return request()->validate([
            'lesson_name' => 'required| max:120',
            'lesson_code' => 'required| max:120',
            'lesson_desc' => 'required| max:120',
            'lesson_ws' => 'required| max:120',
            'lesson_body' => 'required| max:120',

        ]);
    }
}