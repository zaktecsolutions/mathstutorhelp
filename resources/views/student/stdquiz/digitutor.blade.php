{{--  This page will display the user  tables --}}
@extends('layouts.app')
@section('content')
{{-- <div class="container"> --}}
<div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div class="card">
            <div class="card-header">Name: {{ $user->name }}  DigiTutor
                <a class="float-right" href="/studentdashboard">Back to dashboard</a> </div>
            {{-- <a href="blank.html" class="btn btn-primary">Add user</a> --}}
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Quiz Name</th>
                            <th scope="col">Quiz Percent</th>
                            <th scope="col">Quiz Grade</th>
                            <th scope="col">Notes</th>
                            <th scope="col">To Do</th>
                        </tr>
                    </thead> 
                    <tbody>

                    
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$result->quiz->quiz_name }}</td>
                            <td>Percent : {{$result->quiz_percent}}</td>  
                            <td>Grade : {{$result->grade}}</td>
                                          
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection