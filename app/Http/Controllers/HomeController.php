<?php

namespace App\Http\Controllers;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /**
         * Show the application dashboard.
         *
         */
        return view('home');
    }
   
    public function admindashboard()
    { //
        /**
         * retunrs the admin dashboard.
         *
         */
        $users = User::all();
        return view('admin.admindb')->with('users', $users);
    }

    /* public function studentdashboard()
    {
       
        $user = auth()->user();
        $topics = auth()->user()->course->topics;

        return view('student.studentdb')->with([
            'user' => $user,
            'topics' => $topics,
           
        ]);
    } */

   /*  public function tutordashboard()
    {
        
        $user = auth()->user();
        $students = $user->students;
        
        return view('tutor.tutordb')->with([
            'user' => $user,
            'users' => $students,
        ]);
        
    }  */
}