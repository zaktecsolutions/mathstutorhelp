{{--  This page will display the question  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">questions</div>
            <a href="{{ route('admin.questions.create')}}" class="btn btn-primary">Add question</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question Name</th>
                            <th scope="col">Question Body</th>
                            <th scope="col">Question Image</th>
                            <th scope="col">Answer Body</th>
                            <th scope="col">Answer Explanation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                        <tr>
                            <th scope="row">{{ $question->id }}</th>
                            <td>{{ $question->question_name }}</td>
                            <td>{{ $question->question_body }}</td>
                            <td>{{ $question->question_image }}</td>
                            <td>{{ $question->ans_body }}</td>
                            <td>{{ $question->ans_explanation }}</td>
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