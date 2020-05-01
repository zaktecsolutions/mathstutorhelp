@extends('layouts.app')
@section('title', 'Tutor Dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div>
            <h3>Tutor Dashboard</h3>
        </div>

        <div class="card">
            <div class="card-header">Name: {{ $user->name }}
                <a class="float-right" href="/studentdashboard">DigiTutor</a> </div>
            {{-- <a href="blank.html" class="btn btn-primary">Add user</a>  --}}
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Course</th>
                            <th scope="col"></th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ empty($user->course) ? null :$user->course->course_name }}</td>
                            <td>

                                <a href="{{ route('viewstudent', $user->id)}}">
                                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>
                            <td><a href="{{ route('studentdigitutor', $user->id)}}">
                                    <button type="button" class="btn btn-primary float-left">DigiTutor</button></a></td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>F
@endsection