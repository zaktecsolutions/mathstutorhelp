{{-- This page will display the user  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div class="card">
            <div>
                @role('tutor')
                <a href="{{route('digitutor.digitutors.show',$user->digitutor->id)}}" class="float-right btn btn-primary">Show Digitutor Details</a>
                @endrole
                <a class="float-left" href="{{ route('studentdashboard')}}">Back to dashboard</a></div>
            <div class="card-header">
                <h4> {{ $user->name }} DigiTutor </h4>

            </div>

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
                            <th scope="col">Date</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Message</th>
                            <th scope="col">Topic</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->conversations as $conversation)
                        <tr>
                            <th scope="row">{{$conversation->created_at}}</th>
                            <td>{{$conversation->incoming? $conversation->tutor->name : $conversation->student->name}}</td>
                            <td>{{$conversation->message}}</td>
                            <td>{{!empty($conversation->topic) ? $conversation->topic->topic_name : "General"}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4>New Message</h4>
                <form method="POST" action="{{route('digitutor.send-message')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <textarea class="form-control" name="message"></textarea>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="topic_id">
                                <option value="">General</option>
                                @foreach($topics as $topic)
                                <option value="{{$topic->id}}">{{$topic->topic_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" name="student_id" value="{{$user->id}}" />
                            <button class="btn btn-primary float-left">Send</button>
                        </div>
                    </div>
                </form>

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