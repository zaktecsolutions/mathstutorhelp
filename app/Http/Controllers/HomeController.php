<?php

namespace App\Http\Controllers;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*  $request->session()->flash('success', 'testing success flash message');
        $request->session()->flash('warning', 'testing success flash message');
        $request->session()->flash('error', 'testing success flash message'); */

        return view('home');
    }
    /**
     * redirects to the student dashboard
     */
    public function admindashboard()
    { // retunrs the admin dashboard
        return view('admin.admindb');
    }
    /**
     * redirects to the student dashboard
     */
    public function studentdashboard()
    {
        return view('student.studentdb');
    }
    /**
     * redirects to the student dashboard
     */
    public function tutordashboard()
    {
        return view('tutor.tutordb');
    }
}
