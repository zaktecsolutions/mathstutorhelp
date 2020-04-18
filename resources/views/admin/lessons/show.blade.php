{{--  This page will display the lesson  tables --}}{{-- This page will display the lesson tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="/admin/lessons">Back to lessons</a>
            <div class="card">
                <a href="{{ route('admin.lessons.edit', $lesson->id)}}">
                    <button type="button" class="btn btn-primary float-right">Edit</button></a>
                <div class="card-header">Lesson # {{ $lesson->id }}</div>

                <div class="card-body">
                    <div class="row">
                        <label for="lesson_name" class="col-md-2 text-md-right font-weight-bold">lesson Name </label>
                        <div class="col-md-8">
                            {{$lesson->lesson_name }}

                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-2 text-md-right font-weight-bold">Lesson Code</label>
                        <div class="col-md-8">
                            {{ $lesson->lesson_code }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="roles" class="col-md-2 text-md-right font-weight-bold">Lesson Description</label>
                        <div class="col-md-8">
                            {{ $lesson->lesson_desc }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="lesson" class="col-md-2 text-md-right font-weight-bold">Lesson Worksheet</label>
                        <div class="col-md-8">
                            {{ $lesson->lesson_ws }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="lesson" class="col-md-2 text-md-right font-weight-bold">Lesson Body</label>
                        <div class="col-md-8">
                            {{ $lesson->lesson_body }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection