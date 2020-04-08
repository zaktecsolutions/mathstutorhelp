{{--  This page will display the exam  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">exams</div>
            <a href="{{ route('admin.exams.create')}}" class="btn btn-primary">Add exam</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Exam Name</th>
                            <th scope="col">Exam Code</th>
                            <th scope="col">Exam Desc</th>
                            <th scope="col">Exam Body</th>
                            <th scope="col">Exam Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exams as $exam)
                        <tr>
                            <th scope="row">{{ $exam->id }}</th>
                            <td>{{ $exam->exam_name }}</td>
                            <td>{{ $exam->exam_code }}</td>
                            <td>{{ $exam->exam_desc }}</td>
                            <td>{{ $exam->exam_body }}</td>
                            <td>{{ $exam->exam_level }}</td>
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