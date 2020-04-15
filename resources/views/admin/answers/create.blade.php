{{--  This page will display the answer tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
                <div class="card-header">Insert answer </div>
                <div class="card-body">
                    <form action="{{ route('admin.answers.store') }}" method="POST">
                        @csrf
                        @include('partials.inputanswers')
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