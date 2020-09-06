{{-- This page will display the answer tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit answer {{ $answer->id }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.question.answers.update', [$question,$answer]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT')}}
                        @include('admin.answers.form')
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection