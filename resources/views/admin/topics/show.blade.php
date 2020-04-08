{{--  This page will display the topic  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">topics</div>
            <a href="{{ route('admin.topics.create')}}" class="btn btn-primary">Add topic</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Topic Name</th>
                            <th scope="col">Topic Code</th>
                            <th scope="col">Topic Descripton</th>
                            <th scope="col">Topic Lesson Number</th>
                            <th scope="col">Topic Diagnostic Quiz</th>
                            <th scope="col">Topic Summary Quiz</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topics as $topic)
                        <tr>
                            <th scope="row">{{ $topic->id }}</th>
                            <td>{{ $topic->topic_name }}</td>
                            <td>{{ $topic->topic_code }}</td>
                            <td>{{ $topic->topic_desc }}</td>
                            <td>{{ $topic->topic_les_num }}</td>
                            <td>{{ $topic->topic_diagnostic_quiz }}</td>
                            <td>{{ $topic->topic_summary_quiz }}</td>
                            <td>
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