@extends('layouts.app')
@section('title', 'Students')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div>
            <h3>Students</h3>
        </div>

        <div class="card">
            <div class="card-header">All students</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Tutor</th>
                            <th scope="col">Course</th>
                            <th scope="col"></th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $student->id }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ empty($student->tutor)? null : $student->tutor->name }}</td>
                            <td>{{ empty($student->course) ? null :$student->course->course_name }}</td>
                            <td> &nbsp;
                            </td>
                            <td><a href="{{ route('digitutor.view', $student->id)}}">
                                    <button type="button" class="btn btn-primary float-left">DigiTutor</button></a></td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection