{{--  This page will display the quiz  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">quizzes</div>
            <a href="{{ route('admin.quizzes.create')}}" class="btn btn-primary">Add quiz</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">quiz Name</th>
                            <th scope="col">quiz Code</th>
                            <th scope="col"></th>
                            <th scope="col"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quizzes as $quiz)
                        <tr>
                            <th scope="row">{{ $quiz->id }}</th>
                            <td>{{ $quiz->quiz_name }}</td>
                            <td>{{ $quiz->quiz_code }}</td>
                            <td>
                                <a href="{{ route('admin.quizzes.show', $quiz->id)}}">
                                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>


                            <td> <a href="{{ route('admin.quizzes.edit', $quiz->id)}}">
                                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>

                            <td>
                                <form action="{{ route('admin.quizzes.destroy',$quiz->id)}}" method="POST"
                                    class="float-left">
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