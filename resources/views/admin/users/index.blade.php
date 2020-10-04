{{-- This page will display the user tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-11 col-xs-12">
            <div class="card">
                <div class="card-header">Users</div>
                <a href="{{ route('admin.users.create')}}" class="btn btn-primary">Add User</a>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <select id="role" class="form-control">
                                <option value="">Filter By Role</option>
                                @foreach($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="course" class="form-control">
                                <option value="">Filter By Course</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button class="form-control btn btn-primary" @click="filterUsers">Apply</button>
                        </div>
                    </div>
                    <div id="results">
                        @include('admin.users.user-list', ['users' => $users])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection