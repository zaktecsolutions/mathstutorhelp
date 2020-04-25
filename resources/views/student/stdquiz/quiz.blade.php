{{--  This page will display the user  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div class="card">
            <div class="card-header">{{ $quiz->quiz_name }} </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Question Number</th>
                            <th scope="col"> Question </th>
                            <th scope="col">Question Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quiz->questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td> 
                            <td>{{ $question->question_body }}</td>
                            <td>{{ $question->question_grade }}</td>
                            
    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    @endsection