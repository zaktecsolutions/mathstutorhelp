@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 col-sm-11 col-xs-12">
        <div class="row">
            <h3>ADMIN DASHBOARD</h3>
        </div>
        <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.users.index')}}">
                        <h4> Users </h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html">
                        <h4>Tutors </h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.students')}}">
                        <h4>Students </h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html">
                        <h4>Settings</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html">
                        <h4>Settings</h4>
                    </a>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.courses.index')}}">
                        <h4>Courses</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.lessons.index')}}">
                        <h4> Lessons</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.questions.index')}}">
                        <h4>Questions </h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.quizzes.index')}}">
                        <h4>Quizzes </h4>
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Users</div>
            <a href="{{ route('admin.users.create')}}" class="btn btn-primary">Add User</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Course</th>
                            <th scope="col">Roles</th>
                            <th scope="col"></th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        {{-- {{ $user->name}} - {{ $user ->email}} --}}
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ empty($user->course) ? null :$user->course->course_name }}</td>
                            <td>{{ $user->roles->pluck('name')->implode(',') }}</td>
                            <td>

                                <a href="{{ route('admin.users.show', $user->id)}}">
                                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>
                            @can('edit-users')
                            <td><a href="{{ route('admin.users.edit', $user->id)}}">
                                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>
                            @endcan

                            <td>
                                <form action="{{ route('admin.users.destroy',$user)}}" method="POST" class="float-left">
                                    @csrf
                                    {{ @method_field('DELETE')}}
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection