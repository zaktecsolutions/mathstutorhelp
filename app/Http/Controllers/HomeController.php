<?php

namespace App\Http\Controllers;

/**
 * return the view for the home page for any user
 *
 * @return view
 */

class HomeController extends Controller
{

    public function index()
    {

        return view('home');
    }

}