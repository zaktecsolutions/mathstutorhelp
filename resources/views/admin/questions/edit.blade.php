{{--  This page will display the question tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Question {{ $question->id }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.questions.update', $question) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT')}}
                        @include('admin.questions.form')
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection