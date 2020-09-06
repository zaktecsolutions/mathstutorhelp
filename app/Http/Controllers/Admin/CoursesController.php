<?php
namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
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
        $courses = Course::all();

        return view('admin.courses.create')->with('courses', $courses);

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

        $course = Course::create($this->validatedData());

        if ($course) {$request->session()->flash('success', $course->course_name . ' has been inserted');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.courses.index');
        //return redirect()->route('admin.courses'.$course->id);
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

        $course->update($this->validatedData());

        if ($course) {$request->session()->flash('success', $course->course_name . ' has been updated');
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

    protected function validatedData()
    {
        return request()->validate([
            'course_name' => 'required| max:120',
            'course_code' => 'required| max:120',
            'course_desc' => 'required| max:120',
            'course_level' => 'required| max:120',
            'course_image' => 'sometimes|mimes:jpeg,jpg,png | max:10',

        ]);

    }
}