{{-- This page will display the quiz  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Quizzes Index</div>
            <a href="{{ route('admin.quizzes.create')}}" class="btn btn-primary">Add quiz</a>
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-md-3">
                        <select id="course" class="form-control">
                            <option value="">Filter By Course</option>
                            @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="topic" class="form-control">
                            <option value="">Filter By Topic</option>
                            @foreach($topics as $topic)
                            <option value="{{$topic->id}}">{{$topic->topic_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="lesson" class="form-control">
                            <option value="">Filter By Lesson</option>
                            @foreach($lessons as $lesson)
                            <option value="{{$lesson->id}}">{{$lesson->lesson_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button class="form-control btn btn-primary" @click="filterQuiz">Apply</button>
                    </div>
                </div>

                <div id="results">
                    @include('admin.quizzes.quiz-list', ['quizzes' => $quizzes])
                </div>

            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection