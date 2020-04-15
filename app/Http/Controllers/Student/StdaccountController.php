<?php

namespace App\Http\Controllers\Student;
use App\User;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StdaccountController extends Controller
{
    //
    public function __construct()
    {
        /**
         * access to registered user
         */
        $this->middleware('auth');
    }

    /**
     * redirects to the student dashboard
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
     * redirects to the student dashboard
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
