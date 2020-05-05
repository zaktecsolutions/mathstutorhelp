<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function admindashboard()
    { //
        /**
         * retunrs the admin dashboard.
         *
         */
        $users = User::all();
        return view('admin.admindb')->with('users', $users);
    }
    
}