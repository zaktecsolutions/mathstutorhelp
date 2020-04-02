<div class="form-group row">
    <label for="course_name" class="col-md-2 col-form-label text-md-right">Course Name</label>
    <div class="col-md-8">
        <input id="course_name" type="course_name" class="form-control @error('course_name') is-invalid @enderror"
            name="course_name" value="{{$course->course_name ?? '' }}" required autocomplete="course_name" autofocus>
        @error('course_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="course_code" class="col-md-2 col-form-label text-md-right"> Course Code</label>
    <div class="col-md-8">
        <input id="course_code" type="text" class="form-control @error('course_code') is-invalid @enderror"
            name="course_code" value=" {{ $course->course_code ?? '' }} " required autocomplete="course_code" autofocus>
        @error('course_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="course_desc" class="col-md-2 col-form-label text-md-right"> Course Description</label>
    <div class="col-md-8">
        <input id="course_desc" type="text" class="form-control @error('course_desc') is-invalid @enderror"
            name="course_desc" value="{{ $course->course_desc ?? '' }}" required autofocus>
        @error('course_desc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


{{-- <div class="form-group row">
    <label for="course_grade" class="col-md-2 col-form-label text-md-right">Course Grade</label>
    <div class="col-md-6">
        @foreach ($courses as $course)
        <div class="form-check">
            <input type="checkbox" name="courses_grade" value="{{$course->course_grade}}">
@if($course->course_grade->pluck ('id')contains($course->course_grade)) checked
@endif>
<label> {{ $course->course_grade }} </label>
</div>
@endforeach
</div>
</div> --}}

<div class="form-group row">
    <label for="course_grade" class="col-md-2 col-form-label text-md-right"> Course
        Grade</label>
    <div class="col-md-6">
        <input id="course_grade" type="text" class="form-control @error('course_grade') is-invalid @enderror"
            name="course_grade" value="{{ $course->course_grade ?? '' }}" required autofocus>
        @error('course_grade')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="course_image" class="col-md-2 col-form-label text-md-right"> Course
        Image</label>
    <div class="col-md-6">
        <input id="course_image" type="text" class="form-control @error('course_image') is-invalid @enderror"
            name="course_image" value="{{ $course->course_image ?? ''  }}" required autofocus>
        @error('course_image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>