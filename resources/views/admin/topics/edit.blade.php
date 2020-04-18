{{--  This page will display the topic tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit topic {{ $topic->topic_name }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.topics.update', $topic) }}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        @include('admin.topics.form')
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection