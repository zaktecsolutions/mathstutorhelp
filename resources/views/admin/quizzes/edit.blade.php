{{--  This page will display the quiz tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit quiz {{ $quiz->quiz_id }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.quizzes.update', $quiz) }}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        @include('admin.quizzes.form')
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection