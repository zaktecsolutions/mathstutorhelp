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
     * Returns the admin dashboard view with the all the users from the database 
     * Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard')
     */
    public function dashboard()
    {
        $users = User::all();
        return view('admin.admindb')->with('users', $users);
    }
    
    /**
     *
     * Returns the list of students with digitutor from admin dashboard 
     *  Route::get('/students', 'AdminController@students')->name('students')
     * 
     */
    public function students()
    {
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "student");
        })->get();
        return view('admin.students')->with('students', $students);
    }
}