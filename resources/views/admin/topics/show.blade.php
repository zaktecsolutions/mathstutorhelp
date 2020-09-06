{{-- This page will display the topic  tables --}}{{-- This page will display the topic tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{route('admin.course.topics.index',$course)}}">Back to topics</a>
            <div class="card">
                <div>
                    <a href="{{ route('admin.course.topics.edit', [$course,$topic])}}">
                        <button type="button" class="ml-1 btn btn-primary float-right">Edit</button>
                    </a>
                    <a href="{{ route('admin.course.topic.lessons.index', [$course,$topic])}}">
                        <button type="button" class="btn btn-primary float-right">Lessons</button>
                    </a>
                </div>

                <div class="card-header">Topic # {{ $topic->id }}</div>

                <div class="card-body">
                    <div class="row">
                        <label for="topic_name" class="col-md-2 text-md-right font-weight-bold">Topic Name </label>
                        <div class="col-md-8">
                            {{$topic->topic_name }}

                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-2 text-md-right font-weight-bold">Topic Code</label>
                        <div class="col-md-8">
                            {{ $topic->topic_code }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="roles" class="col-md-2 text-md-right font-weight-bold">Topic Descripton</label>
                        <div class="col-md-8">
                            {{ $topic->topic_desc }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="topic" class="col-md-2 text-md-right font-weight-bold">Topic Index</label>
                        <div class="col-md-8">
                            {{ $topic->topic_index }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection