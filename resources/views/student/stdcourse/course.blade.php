{{--  This page will display the user  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div class="card">
            <div class="card-header">Name: {{ $user->name }}
            <a class="float-right" href="/studentdashboard">Back to dashboard</a> </div>
            {{-- <a href="blank.html" class="btn btn-primary">Add user</a> --}}
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Topic Name</th>
                            <th scope="col">Topic Code</th>
                            <th scope="col">Topic Description</th>
                            <th scope="col">Topic Lesson Number</th>
                            <th scope="col">Topic Quiz</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($topics as $topic)
                        <tr>
                            <th scope="row">{{ $topic->id }}</th>
                            <td>{{ $topic->topic_name }}</td>
                            <td>{{ $topic->topic_code }}</td>  
                            <td>{{ $topic->topic_desc }}</td>
                            <td>{{ $topic->topic_les_num }}</td>   
                            <td>{{ $topic->topic_quiz }}</td>                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection