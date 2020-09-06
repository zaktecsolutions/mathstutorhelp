{{--  This page will display the answer tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
                <div class="card-header">Insert answer </div>
                <div class="card-body">
                    <form action="{{ route('admin.question.answers.store',$question->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.answers.form')
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