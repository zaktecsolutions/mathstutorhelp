<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;

class AdminController extends Controller
{
    /**
     * access to registered user
     */
    public function dashboard()
    {
        $users = User::all();
        return view('admin.admindb')->with('users', $users);
    }

    public function students()
    {
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "student");
        })->get();
        return view('admin.students')->with('students', $students);
    }
}
