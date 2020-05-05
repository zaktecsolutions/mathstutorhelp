@extends('layouts.app')
@section('content')
 <div class="row justify-content-center">
    <div class="col-md-9 col-sm-11 col-xs-12">
        <div>
            <h3>Student Dashboard</h3>
        </div>

        <div class="card">
             <div class="card-header">Name: {{ $user->name }}
            <a class="float-right" href="{{ route('studentdigitutor')}}">DigiTutor</a> </div>
           {{-- <a href="blank.html" class="btn btn-primary">Add user</a>  --}}
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Topic Name</th>
                            <th scope="col">Topic Code</th>
                            <th scope="col">Topic Description</th>
                            <th scope="col">Topic Lesson Number</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($topics as $topic)
                        <tr>
                            <th scope="row">{{ $topic->id }}</th>
                            <td><a href="{{route('studenttopic',[$topic->id])}}">{{ $topic->topic_name }}</a></td>
                            <td>{{ $topic->topic_code }}</td>  
                            <td>{{ $topic->topic_desc }}</td>
                            <td>{{ $topic->lessons()->count() }}</td>   
                            <td>{{ $topic->is_complete() ? "Complete" : "Pending" }}</td>                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 

@endsection
