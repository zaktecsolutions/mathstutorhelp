{{-- This page will display the questions tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Questions Index</div>
            <a href="{{ route('admin.questions.create')}}" class="btn btn-primary">Add question</a>
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
                        <select id="quiz" class="form-control">
                            <option value="">Filter By Quiz</option>
                            @foreach($quizes as $quiz)
                            <option value="{{$quiz->id}}">{{$quiz->quiz_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
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