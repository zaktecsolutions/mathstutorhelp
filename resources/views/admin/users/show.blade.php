{{-- This page will display the user tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="/admin/users">Back to Users</a>
            <div class="card">
                <a href="{{ route('admin.users.edit', $user->id)}}">
                    <button type="button" class="btn btn-primary float-right">Edit</button></a>
                <div class="card-header"> User # {{ $user->id }}</div>

                <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-2 text-md-right font-weight-bold">Name</label>
                        <div class="col-md-8">
                            {{ $user->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="email" class="col-md-2 text-md-right font-weight-bold">Email</label>

                        <div class="col-md-8">
                            {{$user->email }}
                        </div>
                    </div>


                    <div class="row">
                        <label for="roles" class="col-md-2 text-md-right font-weight-bold">Roles</label>
                        <div class="col-md-8">
                            @foreach ($user->roles as $role )
                            <label> {{ $role->name }} </label>
                            @endforeach
                        </div>
                    </div>
                    @if(!empty($user->course))
                    <div class="row">
                        <label for="course" class="col-md-2 text-md-right font-weight-bold">Course</label>
                        <div class="col-md-8">
                            {{ $user->course->course_name }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection