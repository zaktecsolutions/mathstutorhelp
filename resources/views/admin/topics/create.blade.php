{{--  This page will display the topic tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
                <div class="card-header">Insert topic </div>
                <div class="card-body">
                    <form action="{{ route('admin.topics.store') }}" method="POST">
                        @csrf
                        @include('partials.inputtopics')
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