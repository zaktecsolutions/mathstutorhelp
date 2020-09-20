{{-- This page will display the questions tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">{{$course->course_name}} Questions</div>
            <a href="{{ route('admin.course.questions.create',[$course])}}" class="btn btn-primary">Add question</a>
            <div class="card-body">
                <div class="row mb-2">
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
                        <select id="quiz" class="form-control">
                            <option value="">Filter By Quiz</option>
                            @foreach($quizes as $quiz)
                            <option value="{{$quiz->id}}">{{$quiz->quiz_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                    <input type="hidden" value="{{$course->id}}" id="course_id" />
                        <button class="form-control btn btn-primary" @click="filterQuestions">Apply</button>
                    </div>
                </div>
                <div id="results">
                    @include('admin.questions.question-list', ['questions' => $questions])
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection