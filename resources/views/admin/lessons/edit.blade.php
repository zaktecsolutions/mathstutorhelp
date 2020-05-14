{{-- This page will display the lesson tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit lesson {{ $lesson->lesson_name }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.course.topic.lessons.update', [$topic->course,$topic,$lesson]) }}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        @include('admin.lessons.form')
                        <input type="hidden" name="topic_id" value="{{$topic->id}}" />
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection