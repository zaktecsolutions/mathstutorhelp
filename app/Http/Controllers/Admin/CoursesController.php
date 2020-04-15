<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;

class CoursesController extends Controller
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
        $courses = Course::all(); //gets all the courses
        // dd($courses);
        return view('admin.courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.courses.create');

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
        $this->validate($request, [
            'course_name' => 'required| max:120',
            'course_code' => 'required| max:120',
            'course_desc' => 'required| max:120',
            'course_level' => 'required| max:120',
            'course_image' => 'required| max:120',
        ]);

        $course = Course::create([
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'course_desc' => $request->course_desc,
            'course_level' => $request->course_level,
            'course_image' => $request->course_image
    ]);

        if ($course->save()) {$request->session()->flash('success', $course->course_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        // return 'User index page';
       // $courses = Course::all(); //gets all the courses
        return view('admin.courses.show')->with('course', $course);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //dd($course)  - check if course is coming

        $courses = Course::all(); //get all the courses
        return view('admin.courses.edit')->with([
            'course' => $course, // send the course you want to edit
            'courses' => $courses, // send all the courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
       // dd($request); //check  request

        $this->validate($request, [
            'course_name' => 'required| max:120',
            'course_code' => 'required| max:120',
            'course_desc' => 'required| max:120',
            'course_level' => 'required| max:120',
            'course_image' => 'required| max:120',
        ]);
        $success = $course->update([
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'course_desc' => $request->course_desc,
            'course_level' => $request->course_level,
            'course_image' => $request->course_image,
        ]);

        if ($success) {$request->session()->flash('success', $course->course_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.courses.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //

    

        $course->delete();

        return redirect()->route('admin.courses.index');
    }
}
