{{--  This page will display the user  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Name: {{ $user->name }}
            <a class="float-right" href="/studentdashboard">Back to dashboard</a> </div>
            {{-- <a href="blank.html" class="btn btn-primary">Add user</a> --}}
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Course</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ empty($user->course) ? null :$user->course->course_name }}</td>
                           
                            <td><a href="{{ route('editstudent')}}">
                                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection