<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
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
        // $users = User::all();
        $user = auth()->user();
        return view('student.account')->with('user', $user);
    }
    /**
     * redirects to the student dashboard
     */
    public function edit()
    {
        // dd($user);
        $user = auth()->user();
        return view('student.editstudent')->with('user', $user);
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
