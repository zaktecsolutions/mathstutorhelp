<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;

class AdminController extends Controller
{
    //
    public function dashboard()
    { //
        /**
         * retunrs the admin dashboard.
         *
         */
        $users = User::all();
        return view('admin.admindb')->with('users', $users);
    }
    
}