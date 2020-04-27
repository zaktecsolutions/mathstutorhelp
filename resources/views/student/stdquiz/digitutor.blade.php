{{--  This page will display the user  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div class="card">
            <div class="card-header">  <h4> {{ $user->name }} DigiTutor  </h4>
                <a class="float-right" href="/studentdashboard">Back to dashboard</a> </div>
            {{-- <a href="blank.html" class="btn btn-primary">Add user</a> --}}
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Quiz Name</th>
                            <th scope="col">Quiz Percent</th>
                            <th scope="col">Quiz Grade</th>
                    
                        </tr>
                    </thead>
                    <tbody>
                        {{--   <tr>
                            <th scope="row">1</th>
                            <td>{{$result->quiz->quiz_name }}</td>
                        <td>Percent : {{$result->quiz_percent}}</td>
                        <td>Grade : {{$result->grade}}</td>
                        </tr>
                        --}}
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header"> <h4> {{ $user->name }} Notes  </h4>
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
            <div class="card-header"><h4> {{ $user->name }} ToDoList  </h4> 
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
                      {{--   @foreach($topic->lessons as $lesson)
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
    </div>
</div>

@endsection