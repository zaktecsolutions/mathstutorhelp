@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-sm-11 col-xs-12">
            <div class="card">
                <div class="card-header">{{$result->quiz->quiz_name }} </div>
                <div class="card-body">
                    <div>Percent : {{$result->quiz_percent}}</div>
                    <div>Grade : {{$result->grade}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection