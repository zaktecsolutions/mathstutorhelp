<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\user;

class AdminController extends Controller
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
    public function dashboard()
    {
        $users = User::all();
        return view('admin.admindb')->with('users', $users);
    }
    
    /**
     * access to registered user
     */
    public function students()
    {
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "student");
        })->get();
        return view('admin.students')->with('students', $students);
    }
}