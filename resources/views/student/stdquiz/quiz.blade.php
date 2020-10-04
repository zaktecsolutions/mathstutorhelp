{{-- This page will display the user  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div class="card">
            <div class="card-header">{{ $quiz->quiz_name }} ({{$quiz->quiz_type}} {{$quiz->quiz_subtype}} quiz)</div>
            <div class="card-body">
                <quiz-component quiz="{{$quiz->id}}"></quiz-component>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    @endsection