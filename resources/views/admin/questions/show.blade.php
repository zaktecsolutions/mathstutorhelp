{{-- This page will display the question  tables --}}{{-- This page will display the question tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-11 col-xs-12">
            <a href="/admin/questions">Back to questions</a>
            <div class="card">
                <a href="{{ route('admin.questions.edit', $question->id)}}">
                    <button type="button" class="btn btn-primary float-right">Edit</button>
                </a>
                <a href="{{ route('admin.question.answers.index', $question->id)}}">
                    <button type="button" class="btn btn-primary float-right">Answers</button>
                </a>
                <div class="card-header">Question # {{ $question->id }}</div>

                <div class="card-body">
                    <div class="row">
                        <label for="question_name" class="col-md-2 text-md-right font-weight-bold">Question Name
                        </label>
                        <div class="col-md-8">
                            {{$question->question_name }}

                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-2 text-md-right font-weight-bold">Question Body</label>
                        <div class="col-md-8">
                            {{ $question->question_body }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="roles" class="col-md-2 text-md-right font-weight-bold">Question Image</label>
                        <div class="col-md-8">
                            {{ $question->question_image }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="question" class="col-md-2 text-md-right font-weight-bold">Question Mark</label>
                        <div class="col-md-8">
                            {{ $question->question_mark }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="question" class="col-md-2 text-md-right font-weight-bold">Question Grade</label>
                        <div class="col-md-8">
                            {{ $question->question_grade}}
                        </div>
                    </div>

                    <div class="row">
                        <label for="question" class="col-md-2 text-md-right font-weight-bold">Question Type</label>
                        <div class="col-md-8">
                            {{ $question->question_type}}
                        </div>
                    </div>

                    <div class="row">
                        <label for="question" class="col-md-2 text-md-right font-weight-bold">Question Category</label>
                        <div class="col-md-8">
                            {{ $question->question_category}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection