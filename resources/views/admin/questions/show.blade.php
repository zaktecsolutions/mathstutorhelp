{{-- This page will display the question tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-11 col-xs-12">
            <a href="/admin/questions">Back to questions</a>
            <div class="card">
                <div>
                    <a href="{{ route('admin.questions.edit', $question->id)}}">
                        <button type="button" class="btn btn-primary float-right ml-1">Edit</button>
                    </a>
                    <a href="{{ route('admin.question.answers.index', $question->id)}}">
                        <button type="button" class="btn btn-primary float-right">Answers</button>
                    </a> </div>
                <div class="card-header">
                    <h5> Question Number {{$question->id }} </h5>
                </div>

                <div class="card-body">

                    <div class="row">
                        <label for="question_body" class="col-md-2 text-md-right font-weight-bold">Lesson ID : </label>
                        <div class="col-md-8">
                            {{ $question->lesson_id}}
                        </div>
                    </div>

                    <div class="row">
                        <label for="question_body" class="col-md-2 text-md-right font-weight-bold">Question Name :
                        </label>
                        <div class="col-md-8">
                            {{ $question->question_name }}
                        </div>
                    </div>


                    <div class="row">
                        <label for="question_body" class="col-md-2 text-md-right font-weight-bold">Question Body :
                        </label>
                        <div class="col-md-8">
                            {{ $question->question_body }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="question_body" class="col-md-2 text-md-right font-weight-bold">Question Code :
                        </label>
                        <div class="col-md-8">
                            {{ $question->question_code }}
                        </div>
                    </div>



                    {{-- 
                    @if($question->question_image)
                    <div class="row">
                        <label for="roles" class="col-md-2 text-md-right font-weight-bold">Question Image</label>
                        <div class="col-md-8">
                            <img height="200" src="{{asset('storage/'.$question->question_image)}}" />
                </div>
            </div>
            @endif --}}

            <div class="row">
                <label for="question" class="col-md-2 text-md-right font-weight-bold">Question Mark</label>
                <div class="col-md-8">
                    {{ $question->question_mark }}
                </div>
            </div>

            <div class="row">
                <label for="question" class="col-md-2 text-md-right font-weight-bold">Question Grade</label>
                <div class="col-md-8">
                    {{ $question->question_grade}}
                </div>
            </div>

            <div class="row">
                <label for="question" class="col-md-2 text-md-right font-weight-bold">Question Type</label>
                <div class="col-md-8">
                    {{ $question->question_type}}
                    @if(empty($question->question_type))

                    <p>No Question Type</p>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="ans_image" class="col-md-2 col-form-label text-md-right font-weight-bold">Answer
                    Image </label>
                <div class="col-md-8">
                    {{$question->question_image }}

                    @if(empty($question->question_image))

                    <p>No Image uploaded</p>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="q_calculator" class="col-md-2 col-form-label text-md-right font-weight-bold ">Calculator Allowed </label>
                <div class="col-md-8">
                    <div class="form-check">
                        <input type="radio" name="q_calculator" value="1" @if(!empty($question) &&
                            $question->q_calculator) checked @endif>
                        <label> Yes </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="q_calculator" value="0" @if(!empty($question) &&
                            !$question->q_calculator) checked @endif>
                        <label> No </label>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
@endsection
{{--      Schema::create('questions', function (Blueprint $table) {
                        $table->bigIncrements('id');
                        $table->unsignedBigInteger('lesson_id')->nullable();
                        $table->string('question_name');
                        $table->text('question_body');
                        $table->string('question_type');
                        $table->string('question_code');
                        $table->string('question_image')->nullable();
                        $table->integer('question_mark');
                        $table->integer('question_grade');
                        $table->boolean('q_calculator')->default(false);
                        $table->timestamps();
                    }); --}}