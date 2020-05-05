{{-- This page will display the user  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div>
            <h3>{{ $topic->topic_name }}</h3>
        </div>

        <div class="card">
            <div class="card-header">Quizzes
                <a class="float-right" href="/studentdashboard">Back to dashboard</a> </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Quiz Name</th>
                            <th scope="col">Quiz Type</th>
                            <th scope="col">Quiz Description</th>
                            <th scope="col">Status</th>
                            <th scope="col"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topic->quizzes as $quiz)
                        <tr>
                            <td>{{ $quiz->quiz_name }}</td>
                            <td>{{ $quiz->quiz_subtype }}</td>
                            <td>{{ $quiz->quiz_desc }}</td>
                            <td>
                            <span class="badge badge-{{$quiz->my_status()}}">Status</span>
                            </td>
                            <td>
                                @if($quiz->quiz_subtype != 'summary' || $topic->summary_enabled())
                                <a href="{{route('studentquiz',[$quiz->id])}}"> <button type="button"
                                        class="btn btn-primary float-left">Take Quiz</button></a>
                            </td>
                            @endif
                            @if(!empty($quiz->my_result()))
                            <td> <a href="{{route('digitutor.quiz-result',[$quiz->my_result()->id])}}"><button type="button"
                                        class="btn btn-primary float-left">Quiz Result</button></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Lessons
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lesson Name</th>
                            <th scope="col">Lesson Description</th>
                            <th scope="col">Status</th>
                            <th scope="col"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topic->lessons as $lesson)
                        <tr>
                            <th scope="row">{{ $lesson->lesson_code }}</th>
                            <td>{{ $lesson->lesson_name }}</td>
                            <td>{{ $lesson->lesson_desc }}</td>
                            <td>
                            <span class="badge badge-{{$lesson->my_status()}}">Status</span>
                            </td>
                            <td> <a href="">
                                    <button type="button" class="btn btn-primary float-left">Lesson</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection