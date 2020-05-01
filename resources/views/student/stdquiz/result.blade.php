@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-11 col-xs-12">
            <div class="card">
                <div class="card-header">Quiz Name {{$result->quiz->quiz_name }}
                    <a class="float-right" href="/studentdashboard">Back to dashboard</a>
                </div>
                <div class="card-body">
                    <div>Quiz Percent : {{$result->quiz_percent}} %</div>
                    <div>Quiz Grade : {{$result->grade}}</div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Answers</div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Questions</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Lesson Code</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result->quizfeedbacks as $quizfeedback)
                            <tr>
                                <td>{{$quizfeedback->question->question_body}}</td>
                                <td> @if($quizfeedback->status == 1)
                                    <span class="badge badge-success badge-pill">{{$quizfeedback->answer}}</span>
                                    @elseif($quizfeedback->status == -1)
                                    <span class="badge badge-danger badge-pill">{{$quizfeedback->answer}}</span>
                                    @else
                                    <span class="badge badge-primary badge-pill">Skipped</span>
                                    @endif
                                </td>
                                <td>{{$quizfeedback->question->lesson_id}}</td>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">C</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">P</label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{--   <ul class="list-group">
                        @foreach($result->quizfeedbacks as $quizfeedback)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$quizfeedback->question->lesson_code}}
                    {{$quizfeedback->question->question_body}}
                    @if($quizfeedback->status == 1)
                    <span class="badge badge-success badge-pill">{{$quizfeedback->answer}}</span>
                    @elseif($quizfeedback->status == -1)
                    <span class="badge badge-danger badge-pill">{{$quizfeedback->answer}}</span>
                    @else
                    <span class="badge badge-primary badge-pill">Skipped</span>
                    @endif

                    </li>
                    @endforeach
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection