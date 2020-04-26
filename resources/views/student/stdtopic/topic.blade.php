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
            <div class="card-header">Quizzes</div>
            <div class="card-body">
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Quiz Name</th>
                            <th scope="col">Quiz Type</th>
                            <th scope="col">Quiz Description</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topic->quizzes as $quiz)
                        <tr>
                            <td>{{ $quiz->quiz_name }}</td>
                            <td>{{ $quiz->quiz_subtype }}</td>
                            <td>{{ $quiz->quiz_desc }}</td>
                            <td>{{$quiz->is_complete() ? 'Complete' : 'Pending'}}</td>
                            <td>
                                @if($quiz->quiz_subtype != 'summary' || $topic->summary_enabled())
                                    <a href="{{route('studentquiz',[$quiz->id])}}">Take Quiz</a>
                                @endif
                                @if(!empty($quiz->my_result()))
                                <a href="{{route('studentquizresult',[$quiz->id])}}">Result</a>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topic->lessons as $lesson)
                        <tr>
                            <th scope="row">{{ $lesson->lesson_code }}</th>
                            <td>{{ $lesson->lesson_name }}</td>
                            <td>{{ $lesson->lesson_desc }}</td>
                            <td>{{$lesson->is_complete() ? 'Complete' : 'Pending'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection