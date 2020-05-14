<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class StdaccountController extends Controller
{
    /**
     * access to registered user
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * access to registered user
     */
    public function studentdashboard()
    {

        $user = auth()->user();
        $topics = auth()->user()->course->topics;

        return view('student.studentdb')->with([
            'user' => $user,
            'topics' => $topics,

        ]);
    }

    /**
     * access to registered user
     */
    public function index()
    {

        $course = auth()->user()->course_name;
        $user = auth()->user();
        return view('student.stdaccount.account')->with([
            'course' => $course,
            'user' => $user,
        ]);
    }

    /**
     * access to registered user
     */
    public function edit()
    {

        // dd($user);
        $user = auth()->user();
        return view('student.stdaccount.editstudent')->with('user', $user);
    }

    /**
     * redirects to the student dashboard
     */
    public function update(Request $request)
    {

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->save()) {$request->session()->flash('success', $user->name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('studentaccount');
    }
}