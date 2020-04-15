{{--  This page will display the quiz tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
                <div class="card-header">Insert quiz </div>
                <div class="card-body">
                    <form action="{{ route('admin.quizzes.store') }}" method="POST">
                        @csrf
                        @include('partials.inputquizzes')
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