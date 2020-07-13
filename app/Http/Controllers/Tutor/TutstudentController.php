<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\User;

class TutstudentController extends Controller
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
    public function show($id)
    {
        $user = User::find($id);
        return view('tutor.show')->with([
            'user' => $user,
        ]);
    }

}