{{--  This page will display the answer  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Answers</div>
            <a href="{{ route('admin.answers.create')}}" class="btn btn-primary">Add answer</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Answer Body</th>
                            <th scope="col"></th>
                            <th scope="col"> Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($answers as $answer)
                        <tr>
                            <th scope="row">{{ $answer->id }}</th>
                            <td>{{ $answer->ans_body }}</td>
                            <td>
                                <a href="{{ route('admin.answers.show', $answer->id)}}">
                                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>


                            <td> <a href="{{ route('admin.answers.edit', $answer->id)}}">
                                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>

                            <td>
                                <form action="{{ route('admin.answers.destroy',$answer->id)}}" method="POST"
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