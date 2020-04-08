{{--  This page will display the lesson tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
                <div class="card-header">Insert lesson </div>
                <div class="card-body">
                    <form action="{{ route('admin.lessons.store') }}" method="POST">
                        @csrf
                        @include('partials.inputlessons')
                        <button type="submit" class="btn btn-primary">
                            Insert
                        </button>
                    </form>
                </div>
            </div> -
        </div>
    </div>
</div>
@endsection