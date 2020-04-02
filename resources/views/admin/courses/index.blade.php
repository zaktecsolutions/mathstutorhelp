{{--  This page will display the course  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Courses</div>
            <a href="{{ route('admin.courses.create')}}" class="btn btn-primary">Add course</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Course Code</th>
                            <th scope="col">Course Descripton</th>
                            <th scope="col">Course Grade</th>
                            <th scope="col">Course Image </th>
                            <th scope="col"></th>
                            <th scope="col"> Action</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <th scope="row">{{ $course->id }}</th>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_desc }}</td>
                            <td>{{ $course->course_grade }}</td>
                            <td>{{ $course->course_image }}</td>
                            <td>
                                <a href="{{ route('admin.courses.show', $course->id)}}">
                                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>


                            <td> <a href="{{ route('admin.courses.edit', $course->id)}}">
                                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>

                            <td>
                                <form action="{{ route('admin.courses.destroy',$course->id)}}" method="POST"
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