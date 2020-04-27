@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-sm-11 col-xs-12">
            <div class="card">
                <div class="card-header">{{$result->quiz->quiz_name }} </div>
                <div class="card-body">
                    <div>Percent : {{$result->quiz_percent}}</div>
                    <div>Grade : {{$result->grade}}</div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Answers</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($result->quizfeedbacks as $quizfeedback)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$quizfeedback->question->question_name}}
                            @if($quizfeedback->status == 1)
                            <span class="badge badge-success badge-pill">{{$quizfeedback->answer}}</span>
                            @elseif($quizfeedback->status == -1)
                            <span class="badge badge-danger badge-pill">{{$quizfeedback->answer}}</span>
                            @else
                            <span class="badge badge-primary badge-pill">Skipped</span>
                            @endif
                            
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection