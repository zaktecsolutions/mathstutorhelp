{{--  This page will display the user tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user {{ $user->name }}</div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        {{-- @include('partials.inputusers', $courses ) --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{$user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}" required autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_name" class="col-md-2 col-form-label text-md-right"> Course Name</label>
                            <div class="col-md-6">
                               {{--  <input id="course_name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="course_name" value="{{ $user->course_name}}" required autofocus> --}}
                                    @foreach ($courses as $course )
                                    <div class="form-check">
                                        <input type="radio" name="course_id" value="{{$course->id ?? ''}}"
                                        @if($user->course->id == $course->id) checked @endif> 
                                        <label> {{ $course->course_name }} </label>
                                    </div>
                                    @endforeach
                                @error('course_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
                            <div class="col-md-6">
                                @foreach ($roles as $role )
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{$role->name}}"
                                        @if($user->hasRole($role->name)) checked @endif>
                                    <label> {{ $role->name }} </label>
                                </div>
                                @endforeach
                            </div>
                        </div> 
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection