{{-- This page will display the user  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4> {{ $user->name }} DigiTutor </h4>
                <a class="float-right" href="{{ route('studentdashboard')}}">Back to dashboard</a>
            </div>
            {{-- <a href="blank.html" class="btn btn-primary">Add user</a> --}}
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Date Taken</th>
                            <th scope="col">Quiz Name</th>
                            <th scope="col">Quiz Percent</th>
                            <th scope="col">Quiz Grade</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <th scope="row">{{$result->created_at}}</th>
                            <td><a href="{{route('digitutor.quiz-result',[$result->id])}}">{{$result->quiz->quiz_name }}</a></td>
                            <td>{{$result->quiz_percent}}</td>
                            <td>{{$result->grade}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4> {{ $user->name }} Notes </h4>
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
                        {{-- @foreach($topic->lessons as $lesson)
                        <tr>
                            <th scope="row">{{ $lesson->lesson_code }}</th>
                        <td>{{ $lesson->lesson_name }}</td>
                        <td>{{ $lesson->lesson_desc }}</td>
                        <td>{{$lesson->is_complete() ? 'Complete' : 'Pending'}}</td>
                        <td> <a href="">
                                <button type="button" class="btn btn-primary float-left">Lesson</button></a></td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4> {{ $user->name }} ToDoList </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Topic Name</th>
                            <th scope="col">Lesson Name</th>
                            <th scope="col">Status</th>
                            <th scope="col"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todos as $lesson)
                        <tr>
                            <th scope="row">{{ $lesson->lesson_code }}</th>
                            <td>{{ $lesson->topic->topic_name }}</td>
                            <td>{{ $lesson->lesson_name }}</td>
                            <td>{{ $lesson->lesson_desc }}</td>
                            <td><span class="badge badge-{{$lesson->my_status($user)}}">Status</span></td>
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