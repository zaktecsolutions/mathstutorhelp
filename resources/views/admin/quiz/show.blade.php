{{-- This page will display the quiz  tables --}}{{-- This page will display the quiz tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route($routeData->routePrefix.'quizzes.index',$routeData->routeParams) }}">Back to quizzes</a>
            <div class="card">
                <a class="btn btn-primary float-right" href="{{ route($routeData->routePrefix.'quizzes.edit', $routeData->routeParams)}}">
                    Edit</a>
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

                    <div class="form-group row">
                        <label for="calculator" class="col-md-2 col-form-label text-md-right font-weight-bold ">Calculator Allowed </label>
                        <div class="col-md-8">
                            <div class="form-check">
                                <input type="radio" name="calculator" value="1" @if(!empty($quiz) && $quiz->calculator) checked @endif>
                                <label> Yes </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="calculator" value="0" @if(!empty($quiz) && !$quiz->calculator) checked @endif>
                                <label> No </label>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        @endsection