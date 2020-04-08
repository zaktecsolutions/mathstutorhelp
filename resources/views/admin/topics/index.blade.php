{{--  This page will display the topics tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Topics</div>
            <a href="{{ route('admin.topics.create')}}" class="btn btn-primary">Add topic</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Topic Name</th>
                            <th scope="col">Topic Code</th>
                        {{--     <th scope="col">Topic Descripton</th>
                            <th scope="col">Topic Lesson Number</th>
                            <th scope="col">Topic Diagnostic Quiz</th>
                            <th scope="col">Topic Summary Quiz</th> --}}
                            <th scope="col"></th>
                            <th scope="col"> Action</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($topics as $topic)
                        <tr>
                            <th scope="row">{{ $topic->id }}</th>
                            <td>{{ $topic->topic_name }}</td>
                            <td>{{ $topic->topic_code }}</td>
                           {{--  <td>{{ $topic->topic_desc }}</td>
                            <td>{{ $topic->topic_les_num }}</td>
                            <td>{{ $topic->topic_diagnostic_quiz }}</td>
                            <td>{{ $topic->topic_summary_quiz }}</td> --}}
                            <td>
                                <a href="{{ route('admin.topics.show', $topic->id)}}">
                                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>


                            <td> <a href="{{ route('admin.topics.edit', $topic->id)}}">
                                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>

                            <td>
                                <form action="{{ route('admin.topics.destroy',$topic->id)}}" method="POST"
                                    class="float-left">
                                    @csrf
                                    {{ @method_field('DELETE')}}
                                    <button type="submit" class="btn btn-warning">Delete</button>
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