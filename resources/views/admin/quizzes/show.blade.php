{{--  This page will display the quiz  tables --}}{{-- This page will display the quiz tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/quizzes">Back to quizzes</a>
            <div class="card">
                <a href="{{ route('admin.quizzes.edit', $quiz->id)}}">
                    <button type="button" class="btn btn-primary float-right">Edit</button></a>
                <div class="card-header">Quiz # {{ $quiz->id }}</div>

                <div class="card-body">
                    <div class="row">
                        <label for="quiz_name" class="col-md-2 text-md-right font-weight-bold">Quiz Name </label>
                        <div class="col-md-8">
                            {{$quiz->quiz_name }}

                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-2 text-md-right font-weight-bold">Quiz Code</label>
                        <div class="col-md-8">
                            {{ $quiz->quiz_code }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="roles" class="col-md-2 text-md-right font-weight-bold">Quiz Descripton</label>
                        <div class="col-md-8">
                            {{ $quiz->quiz_desc }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quiz" class="col-md-2 text-md-right font-weight-bold">Quiz Type</label>
                        <div class="col-md-8">
                            {{ $quiz->quiz_type }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quiz" class="col-md-2 text-md-right font-weight-bold">Quiz SubType</label>
                        <div class="col-md-6">
                            {{ $quiz->quiz_subtype }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
