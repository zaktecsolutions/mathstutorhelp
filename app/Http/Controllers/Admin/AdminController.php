<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\user;
use App\Course;



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
     * Returns the admin dashboard view with the all the users from the database 
     * Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard')
     */
    public function dashboard()
    {
        $users = User::all();
        $courses = Course::all(); //gets all the courses
        return view('admin.admindb')->with('users', $users)->with('courses',$courses);
              
        
    }
    
}