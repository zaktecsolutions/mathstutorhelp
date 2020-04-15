{{--  This page will display the topic  tables --}}{{-- This page will display the topic tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="/admin/topics">Back to topics</a>
            <div class="card">
                <a href="{{ route('admin.topics.edit', $topic->id)}}">
                    <button type="button" class="btn btn-primary float-right">Edit</button></a>
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
                        <label for="topic" class="col-md-2 text-md-right font-weight-bold">Topic Lesson Number</label>
                        <div class="col-md-8">
                            {{ $topic->topic_les_num }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="topic" class="col-md-2 text-md-right font-weight-bold">Topic Diagnostic Quiz</label>
                        <div class="col-md-8">
                            {{ $topic->topic_diagnostic_quiz }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="topic" class="col-md-2 text-md-right">Topic Summary Quiz</label>
                        <div class="col-md-8">
                            {{ $topic->topic_summary_quiz }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endsection