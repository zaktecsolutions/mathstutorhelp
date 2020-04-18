{{--  This page will display the lessons tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">lessons</div>
            <a href="{{ route('admin.lessons.create')}}" class="btn btn-primary">Add lesson</a>
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
                        @foreach($lessons as $lesson)
                        <tr>
                            <th scope="row">{{ $lesson->id }}</th>
                            <td>{{ $lesson->lesson_name }}</td>
                            <td>{{ $lesson->lesson_code }}</td>
                           
                            <td>
                                <a href="{{ route('admin.lessons.show', $lesson->id)}}">
                                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>


                            <td> <a href="{{ route('admin.lessons.edit', $lesson->id)}}">
                                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>

                            <td>
                                <form action="{{ route('admin.lessons.destroy',$lesson->id)}}" method="POST"
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