{{-- 
    This page will display the answer  tables from the questions pages 
    --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <a href="{{ route('admin.questions.show', [$question->id])}}">Back to question</a>
        <div class="card">
            <div class="card-header">
                <p class="font-weight-bold">Question Number {{ $question->id }} </p>
                <h5> {{$question->question_body}}</h5>
                @if(!empty($question->question_image))
                <div>
                    {{$question->question_image}}
                </div>
                @endif
            </div>
            <a href="{{ route('admin.question.answers.create',$question->id)}}" class="btn btn-primary">Add Answer</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Answer Body</th>
                            <th class="text-center" scope="col" colspan="3"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($answers as $answer)
                        <tr>
                            <th scope="row">{{ $answer->id }}</th>
                            <td>{{ $answer->ans1_body}}</td>
                            <td>
                                <a href="{{ route('admin.question.answers.show',[$question->id, $answer->id])}}">
                                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>


                            <td> <a href="{{ route('admin.question.answers.edit',[$question->id, $answer->id])}}">
                                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>

                            <td>
                                <form action="{{ route('admin.question.answers.destroy',[$question->id,$answer->id])}}"
                                    method="POST" class="float-left">
                                    @csrf
                                    {{ @method_field('DELETE')}}
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection