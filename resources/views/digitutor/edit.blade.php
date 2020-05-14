@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div>
                    <a href="{{route('digitutor.digitutors.show',$digitutor->id)}}">Back to degitutor details</a>
                </div>
                <div class="card-header">Edit digitutor for {{ $digitutor->user->name }}</div>
                <div class="card-body">
                    <form action="{{ route('digitutor.digitutors.update', $digitutor) }}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection