{{--  This page will display the user  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div class="card">
            <div class="card-header">Name: {{ $user->name }} Topic Quiz </div>
            <div class="card-body">
                <h1>{{ $quiz->question->body }}</h1>
                {{-- {!! Form::open() !!}
                @foreach($quizz->question->answer->shuffle() as $answer)
                <h3>
                    <div class="form-group">
                        <div class="radio">
                            {{Form::radio('result', $answer->is_correct) }}
                            {{ Form::label('answer', $answer->answer) }}
                        </div>
                    </div>
                </h3>
                @endforeach
                {{Form::submit('Submit answer') }}
                {!! Form::close() !!} --}}
            </div>
        </div>
    </div>
    {{-- </div> --}}
    @endsection