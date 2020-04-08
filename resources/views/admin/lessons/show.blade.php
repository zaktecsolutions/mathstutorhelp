{{--  This page will display the lesson  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">lessons</div>
            <a href="{{ route('admin.lessons.create')}}" class="btn btn-primary">Add lesson</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lesson Name</th>
                            <th scope="col">Lesson Code</th>
                            <th scope="col">Lesson Desc</th>
                            <th scope="col">Lesson Worksheet</th>
                            <th scope="col">Lesson Body</th>
                            <th scope="col">Lesson Quiz</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lessons as $lesson)
                        <tr>
                            <th scope="row">{{ $lesson->id }}</th>
                            <td>{{ $lesson->lesson_name }}</td>
                            <td>{{ $lesson->lesson_code }}</td>
                           <td>{{ $lesson->lesson_desc }}</td>
                            <td>{{ $lesson->lesson_ws }}</td>
                            <td>{{ $lesson->lesson_body }}</td>
                            <td>{{ $lesson->lesson_quiz }}</td> 
                            <td>
                            </td>
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