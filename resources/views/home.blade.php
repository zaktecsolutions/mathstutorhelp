@extends('layouts.app')
@section('title', 'MTH HomePage')
@section('content')
<section class="jumbotron text-center">

        {{-- Home page where user can login and register  --}}

    <h1 class="jumbotron-heading">Welcome to Maths Tutor Help </h1>

    <p class="lead text-muted">This is MTH online learning platfrom - blended approach to learning maths. Please login
        or register to this platform </p>

    <p>

        <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }} </a>

        <a class="btn btn-secondary" href="{{ route('register') }}">{{ __('Register') }} </a>
       

    </p>

   

</section>

@endsection  