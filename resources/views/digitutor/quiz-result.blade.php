@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-11 col-xs-12">
            <div class="card">
                <div class="card-header">Quiz Name: {{$result->quiz->quiz_name }}
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
                                <th scope="col">Lesson Code</th>
                                <th scope="col">Questions</th>
                                <th scope="col">Learner Answer</th>
                                <th scope="col">Tutor Answer</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result->quizfeedbacks as $quizfeedback)
                            <tr>
                                <td>{{$quizfeedback->question->lesson->lesson_code}}</td>
                                <td>{{$quizfeedback->question->question_body}}</td>
                                <td> @if($quizfeedback->status == 1)
                                    <span id="badge-{{$quizfeedback->id}}"
                                        class="badge badge-success badge-pill">{{$quizfeedback->answer}}</span>
                                    @elseif($quizfeedback->status == -1)
                                    <span id="badge-{{$quizfeedback->id}}"
                                        class="badge badge-danger badge-pill">{{$quizfeedback->answer}}</span>
                                    @else
                                    <span id="badge-{{$quizfeedback->id}}"
                                        class="badge badge-primary badge-pill">Skipped</span>
                                    @endif
                                </td>
                                <td>{{$quizfeedback->question->right_answer()->ans_body}}</td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input @change="markAnswer({{$quizfeedback->id}},1)"
                                            name="result-{{$quizfeedback->id}}" class="form-check-input" type="radio"
                                            id="inlineCheckbox1" value="1" @if($quizfeedback->status == 1) checked
                                        @endif>
                                        <label class="form-check-label" for="inlineCheckbox1">Right</label>

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input @change="markAnswer({{$quizfeedback->id}},-1)"
                                            name="result-{{$quizfeedback->id}}" class="form-check-input" type="radio"
                                            id="inlineCheckbox2" value="-1" @if($quizfeedback->status != 1) checked
                                        @endif>
                                        <label class="form-check-label" for="inlineCheckbox2">Wrong</label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection