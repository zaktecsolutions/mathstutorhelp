{{--  This page will display the exam tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit exam {{ $exam->exam_name }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.exams.update', $exam) }}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        @include('partials.inputexams')
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection