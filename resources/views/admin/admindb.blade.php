@extends('layouts.app')
@section('content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-10">
                <h2>ADMIN DASHBOARD</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-lg-10 ">
                <div class="alert alert-info">
                    <strong>Welcome Admin ! </strong> Choose any of the following options.
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.users.index')}}">
                        <h4>Monitor Users </h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html">
                        <h4>Monitor Tutors </h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html">
                        <h4>DigiTutor </h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html">
                        <h4>Settings</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html">
                        <h4>Settings</h4>
                    </a>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row text-center pad-top">

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.courses.index')}}">
                        <h4>Input Courses</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.topics.index')}}">
                        <h4>Input Topics</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.lessons.index')}}">
                        <h4>Input Lessons</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.questions.index')}}">
                        <h4>Input Questions </h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{ route('admin.quizzes.index')}}">
                        <h4>Input Quizzes </h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-lg-10 ">
            <br />
            <div class="alert alert-dark">
                <strong>Want More Icons Free ? </strong> Checkout fontawesome website and use any icon <a
                    target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">Click Here</a>.
            </div>

        </div>
    </div>
    <!-- /. ROW  -->
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
@endsection