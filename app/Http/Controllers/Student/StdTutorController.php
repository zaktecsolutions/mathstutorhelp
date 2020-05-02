<?php

namespace App\Http\Controllers\Tutor;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StdTutorController extends Controller
{
    //
    public function show($id)
    {
        $user = User::find($id);
        return view('tutor.show')->with([
            'user' => $user
        ]);
    }

    public function showdigitutor($id)
    {
        $user = User::find($id);
        //return view('tutor.show')->with([
            return view('student.stdquiz.digitutor')->with([
            'user' => $user
        ]);
    }
}