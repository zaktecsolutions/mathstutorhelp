@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div>
                    <a href="{{route('digitutor.view',$digitutor->user->id)}}">Back to student/digitutor dashboard</a>
                    <a href="{{ route('digitutor.digitutors.edit', $digitutor->id)}}">
                        <button type="button" class="btn btn-primary float-right">Edit</button></a>
                </div>

                <div class="card-header"> Digitutor for {{ $digitutor->user->name }}</div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    @endsection