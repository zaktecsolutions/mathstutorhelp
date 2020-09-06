{{--
      This page will display the answer tables 
    --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('admin.question.answers.index', [$question->id])}}">Back to answers</a>
            <div class="card">
                <a href="{{ route('admin.question.answers.edit', [$question->id,$answer->id])}}">
                    <button type="button" class="btn btn-primary float-right">Edit</button></a>
                <div class="card-header">
                    <h5> Answer Number {{ $answer->id }} </h5>
                </div>
                <div class="card-body">


                    <div class="row">
                        <label for="ans1_b" class="col-md-2 text-md-right font-weight-bold">Answer Body</label>
                        <div class="col-md-8">
                            {{ $answer->ans1_b}} {{ $answer->ans1_body}} {{ $answer->ans1_a}} {{ $answer->ans2_b}}
                            {{ $answer->ans2_body}} {{ $answer->ans2_a}} {{ $answer->ans3_body}}
                        </div>
                    </div>
                    <div class="row">
                        <label for="question_code" class="col-md-2 text-md-right font-weight-bold">Question Code
                        </label>
                        <div class="col-md-8">
                            {{ $answer->question_code }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="ans_explanation" class="col-md-2 text-md-right font-weight-bold">Answer
                            Explanation</label>
                        <div class="col-md-8">
                            {{ $answer->ans_explanation }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="ans_image" class="col-md-2 col-form-label text-md-right font-weight-bold">Answer
                            Image </label>
                        <div class="col-md-8">
                            {{$answer->ans_image }}

                            @if(empty($answer->ans_image))

                            <p>No Image uploaded</p>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="ans_correct" class="col-md-2 col-form-label text-md-right font-weight-bold ">Is
                            Correct</label>
                        <div class="col-md-8">
                            <div class="form-check">
                                <input type="radio" name="ans_correct" value="1" @if(!empty($answer) &&
                                    $answer->ans_correct) checked @endif>
                                <label> Yes </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="ans_correct" value="0" @if(!empty($answer) &&
                                    !$answer->ans_correct) checked @endif>
                                <label> No </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection