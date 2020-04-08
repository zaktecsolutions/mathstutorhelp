<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
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
     * redirects to the tutor dashboard
     */
    public function index()
    {
        // $users = User::all();
        $user = auth()->user();
        return view('tutor.account')->with('user', $user);
    }
    /**
     * redirects to the tutor dashboard
     */
    public function edit()
    {
        // dd($user);
        $user = auth()->user();
        return view('tutor.editstudent')->with('user', $user);
    }
    /**
     * redirects to the tutor dashboard
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

        return redirect()->route('tutoraccount');
    }


}
