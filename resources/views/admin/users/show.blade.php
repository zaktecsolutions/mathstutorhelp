{{-- This page will display the user tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/users">Back to Users</a>
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    <div class="row">
                        <label for="email" class="col-md-2 text-md-right">Email</label>

                        <div class="col-md-6">
                            {{$user->email }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-2 text-md-right">Name</label>
                        <div class="col-md-6">
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="roles" class="col-md-2 text-md-right">Roles</label>
                        <div class="col-md-6">
                            @foreach ($user->roles as $role )
                            <label> {{ $role->name }} </label>
                            @endforeach
                        </div>
                    </div>
                    @if(!empty($user->course))
                    <div class="row">
                        <label for="course" class="col-md-2 text-md-right">Course</label>
                        <div class="col-md-6">
                            {{ $user->course->course_name }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection