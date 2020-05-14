<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/mixins.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>
    <div id="app">
        <nav class=" navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'MTH') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- <a class="navbar-brand"><img src="http://mathstutorhelp-env.5enpe4ajs2.eu-west-2.elasticbeanstalk.com/images/mathstutorhelplogo.png"> </a> --}}
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href={{ url('/') }}>HomePage </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Demo </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">FAQ </a>
                        </li>
                        @else
                        @role('admin')
                        <li class="nav-item">
                             <a class="nav-link" href="{{ route('admin.dashboard')}}"> Admin Dashboard </a> 
                        </li> 
                        @endrole
                        @role('student')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('studentdashboard')}}">Student Dashboard</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('studentaccount')}}">myAccount</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('digitutor.view',[auth()->user()->id])}}">DigiTutor</a>
                        </li>
                        @endrole
                        @role('tutor')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tutordashboard')}}"> Tutor Dashboard</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tutoraccount')}}">myAccount</a>
                        </li>
                        @endrole
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.courses.index')}}"> Contact Us</a>
                        </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <ul class="navbar-right">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-light"> {{ Auth::user()->name }}
                                        Logout</button>
                                </form>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @include('partials.alerts')
                @yield('content')
            </div>
        </main>
        <!-- Footer template -->
        <footer class="text-white bg-dark">

            <div class="container">

                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">© 2018 Copyright: MathsTutorHelp

                </div>
                <!-- Copyright --->
            </div>

        </footer>
    </div>

</body>

</html>