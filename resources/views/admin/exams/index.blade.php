{{--  This page will display the exams tables --}}
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
                           {{--  <th scope="col">exam Desc</th>
                            <th scope="col">exam Worksheet</th>
                            <th scope="col">exam Body</th>
                            <th scope="col">exam Quiz</th> --}}
                            <th scope="col"></th>
                            <th scope="col"> Action</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($exams as $exam)
                        <tr>
                            <th scope="row">{{ $exam->id }}</th>
                            <td>{{ $exam->exam_name }}</td>
                            <td>{{ $exam->exam_code }}</td>
                           {{--  <td>{{ $exam->exam_desc }}</td>
                            <td>{{ $exam->exam_ws }}</td>
                            <td>{{ $exam->exam_body }}</td>
                            <td>{{ $exam->exam_quiz }}</td> --}}
                            <td>
                                <a href="{{ route('admin.exams.show', $exam->id)}}">
                                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>


                            <td> <a href="{{ route('admin.exams.edit', $exam->id)}}">
                                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>

                            <td>
                                <form action="{{ route('admin.exams.destroy',$exam->id)}}" method="POST"
                                    class="float-left">
                                    @csrf
                                    {{ @method_field('DELETE')}}
                                    <button type="submit" class="btn btn-warning">Delete</button>
                                </form>
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