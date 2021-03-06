<?php

/**
 * access to registered user
 */

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * access to registered user
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 'User index page';
        $users = User::all();
        $roles = Role::all();
        $courses = Course::all();
        return view('admin.users.index', compact('users', 'roles', 'courses'));
    }

    public function filter(Request $request)
    {
        $query = User::query();

        if ($request->has('course_id') && !empty($request->course_id)) {
            $query->where('course_id', $request->course_id);
        }

        if ($request->has('role_name') && !empty($request->role_name)) {
            $roleName = $request->role_name;
            $query->whereHas("roles", function ($q) use ($roleName) {
                $q->where("name", $roleName);
            });
        }

        return view('admin.users.user-list')->with('users', $query->get());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Course::all();
        return view('admin.users.create')->with([
            'courses' => $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        // dd($user);
        if (Gate::denies('edit-users')) {
            return redirect(route('admin.users.index'));
        }
        $courses = Course::all();
        $roles = Role::all();
        $tutors = User::whereHas("roles", function ($q) {
            $q->where("name", 'tutor');
        })->get();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'courses' => $courses,
            'tutors' => $tutors
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //dd($request);
        /*  $user->roles()->sync($request->roles); // attach a role to the user
        $user->name = $request->name;
        $user->email = $request->email; */

        $success = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course_id,
            'tutor_id' => $request->tutor_id,
        ]);
        $user->syncRoles($request->roles);
        // return $success;

        if ($success) {
            $request->session()->flash('success', $user->name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // dd($user);

        if (Gate::denies('delete-users')) {
            return redirect(route('admin.users.index'));
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
