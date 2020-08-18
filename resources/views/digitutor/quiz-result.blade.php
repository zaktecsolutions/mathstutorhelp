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
                                @role('tutor')
                                <th scope="col">Tutor Answer</th>
                                <th scope="col">Action</th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result->quizfeedbacks as $quizfeedback)
                            <tr>
                                <td>{{$quizfeedback->question->lesson->lesson_code}}</td>
                                <td>{{$quizfeedback->question->question_body}}</td>
                                <td> @if($quizfeedback->status == 1)
                                    <span class="badge badge-success badge-pill badge-{{$quizfeedback->id}}">{{$quizfeedback->answer1}}</span>
                                    @if(!empty($quizfeedback->answer2))
                                    <span class="badge badge-success badge-pill badge-{{$quizfeedback->id}}">{{$quizfeedback->answer2}}</span>
                                    @endif
                                    @if(!empty($quizfeedback->answer3))
                                    <span class="badge badge-success badge-pill badge-{{$quizfeedback->id}}">{{$quizfeedback->answer3}}</span>
                                    @endif
                                    @elseif($quizfeedback->status == -1)
                                    <span class="badge badge-danger badge-pill badge-{{$quizfeedback->id}}">{{$quizfeedback->answer1}}</span>
                                    @if(!empty($quizfeedback->answer2))
                                    <span class="badge badge-danger badge-pill badge-{{$quizfeedback->id}}">{{$quizfeedback->answer2}}</span>
                                    @endif
                                    @if(!empty($quizfeedback->answer3))
                                    <span class="badge badge-danger badge-pill badge-{{$quizfeedback->id}}">{{$quizfeedback->answer3}}</span>
                                    @endif
                                    @else
                                    <span class="badge badge-primary badge-pill badge-{{$quizfeedback->id}}">Skipped</span>
                                    @endif
                                </td>
                                @role('tutor')
                                <td>
                                    <span class="badge badge-secondary badge-pill">{{$quizfeedback->question->right_answer()->ans1_body}}</span>
                                    @if(!empty($quizfeedback->question->right_answer()->ans2_body))
                                    <span class="badge badge-secondary badge-pill">{{$quizfeedback->question->right_answer()->ans2_body}}</span>
                                    @endif
                                    @if(!empty($quizfeedback->question->right_answer()->ans3_body))
                                    <span class="badge badge-secondary badge-pill">{{$quizfeedback->question->right_answer()->ans3_body}}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input @change="markAnswer({{$quizfeedback->id}},1)" name="result-{{$quizfeedback->id}}" class="form-check-input" type="radio" id="inlineCheckbox1" value="1" @if($quizfeedback->status == 1) checked
                                        @endif>
                                        <label class="form-check-label" for="inlineCheckbox1">Right</label>

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input @change="markAnswer({{$quizfeedback->id}},-1)" name="result-{{$quizfeedback->id}}" class="form-check-input" type="radio" id="inlineCheckbox2" value="-1" @if($quizfeedback->status != 1) checked
                                        @endif>
                                        <label class="form-check-label" for="inlineCheckbox2">Wrong</label>
                                    </div>
                                </td>
                                @endrole
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