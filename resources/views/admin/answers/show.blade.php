{{--  This page will display the answer  tables --}}{{-- This page will display the answer tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/answers">Back to answers</a>
            <div class="card">
                <a href="{{ route('admin.answers.edit', $answer->id)}}">
                    <button type="button" class="btn btn-primary float-right">Edit</button></a>
                <div class="card-header">Answer # {{ $answer->id }}</div>
                <div class="card-body">
                    <div class="row">
                        <label for="ans_image" class="col-md-2 text-md-right font-weight-bold">Answer Image </label>
                        <div class="col-md-8">
                            {{$answer->ans_image }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-2 text-md-right font-weight-bold">Answer Body</label>
                        <div class="col-md-8">
                            {{ $answer->ans_body}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="roles" class="col-md-2 text-md-right font-weight-bold">Answer Explanation</label>
                        <div class="col-md-8">
                            {{ $answer->ans_explanation }}
                        </div>
                    </div>

                   

                    
                </div>
            </div>
        </div>
        @endsection