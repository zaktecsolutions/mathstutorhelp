<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        /**
         * access to registered user
         */
        $this->middleware('auth');
    }

    public function index(Course $course)
    {
        return view('admin.topics.index')->with(
            [
                'course' => $course,
                'topics' => $course->topics
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        //
        return view('admin.topics.create')->with(['course' => $course]);
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

        $topic = Topic::create($this->validatedData());

        if ($topic) {
            $request->session()->flash('success', $topic->topic_name . ' has been inserted');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }
        return redirect()->route('admin.course.topics.index', [$course->id]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Topic $topic)
    {
        //
        // return 'User index page';
        // $topics = Topic::all(); gets all the topics
        return view('admin.topics.show')->with([
            'topic' => $topic,
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Topic $topic)
    {
        //dd($topic)  - check if topic is coming

        $topics = Topic::all(); //get all the topics
        return view('admin.topics.edit')->with([
            'topic' => $topic, // send the topic you want to edit
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Topic $topic)
    {
        //
        $topic->update($this->validatedData());

        if ($topic) {
            $request->session()->flash('success', $topic->topic_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.course.topics.index', [$course->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Topic $topic)
    {
        //
        $topic->delete();

        return redirect()->route('admin.topics.index', [$course->id]);
    }

    protected function validatedData()
    {
        return request()->validate([
            'topic_name' => 'required| max:120',
            'topic_code' => 'required| max:120',
            'topic_desc' => 'required| max:120',
            'topic_index' => 'required| numeric|min:1|max:100',

        ]);

    }
}