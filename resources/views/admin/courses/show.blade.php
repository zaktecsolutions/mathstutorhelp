{{-- This page will display the course  tables --}}{{-- This page will display the course tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/courses">Back to courses</a>
            <div class="card">
                <div>
                    <a href="{{ route('admin.courses.edit', $course->id)}}">
                        <button type="button" class="btn ml-1 btn-primary float-right">Edit</button>
                    </a>
                    <a href="{{ route('admin.course.topics.index', $course->id)}}">
                        <button type="button" class="ml-1 btn btn-primary float-right">Topics</button>
                    </a>
                    <a href="{{ route('admin.course.quizzes.index', ['course' => $course])}}">
                        <button type="button" class="btn ml-1 btn-primary float-right">Quizzes</button>
                    </a>
                    <a href="{{ route('admin.course.questions.index', ['course' => $course])}}">
                        <button type="button" class="btn btn-primary float-right">Questions</button>
                    </a>
                </div>
                <div class="card-header">Course {{ $course->id }}</div>

                <div class="card-body">
                    <div class="row">
                        <label for="course_name" class="col-md-2 text-md-right font-weight-bold">Course Name : </label>
                        <div class="col-md-8">
                            {{$course->course_name }}

                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-2 text-md-right font-weight-bold">Course Code </label>
                        <div class="col-md-8">
                            {{ $course->course_code }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="roles" class="col-md-2 text-md-right font-weight-bold">Course Descripton </label>
                        <div class="col-md-8">
                            {{ $course->course_desc }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="course" class="col-md-2 text-md-right font-weight-bold">Course level </label>
                        <div class="col-md-8">
                            {{ $course->course_level }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="ans_image" class="col-md-2 col-form-label text-md-right font-weight-bold">Course
                            Image </label>
                        <div class="col-md-8">

                            @if(empty($course->course_image))

                            <p>No Image uploaded</p>
                            @else
                            <img src="{{asset('storage/'.$course->course_image)}}" height="200px" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection