{{-- This page will display the lesson tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Insert lesson to {{$topic->topic_name}} </div>
                <div class="card-body">
                    <form action="{{ route('admin.course.topic.lessons.store',[$topic->course,$topic]) }}" method="POST">
                        @csrf
                        @include('admin.lessons.form')
                        <input type="hidden" name="topic_id" value="{{$topic->id}}" />
                        <button type="submit" class="btn btn-primary">
                            Insert
                        </button>
                    </form>
                </div>
            </div> -
        </div>
    </div>
</div>
@endsection