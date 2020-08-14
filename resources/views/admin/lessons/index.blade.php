{{-- This page will display the lessons tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">lessons</div>
            <a href="{{ route('admin.course.topic.lessons.create',[$topic->course,$topic])}}" class="btn btn-primary">Add lesson</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lesson Name</th>
                            <th scope="col">Lesson Code</th>
                            <th scope="col"></th>
                            <th scope="col"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lessons as $index=>$lesson)
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $lesson->lesson_name }}</td>
                            <td>{{ $lesson->lesson_code }}</td>

                            <td>
                                <a href="{{ route('admin.course.topic.lessons.show',[$topic->course,$topic, $lesson])}}">
                                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>


                            <td> <a href="{{ route('admin.course.topic.lessons.edit', [$topic->course,$topic, $lesson])}}">
                                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>

                            <td>
                                <form action="{{ route('admin.course.topic.lessons.destroy',[$topic->course,$topic, $lesson])}}" method="POST" class="float-left">
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