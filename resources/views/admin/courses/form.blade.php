<div class="form-group row">
    <label for="course_name" class="col-md-2 col-form-label text-md-right">Course Name</label>
    <div class="col-md-8">
        <input id="course_name" type="course_name" class="form-control @error('course_name') is-invalid @enderror"
            name="course_name" value="{{$course->course_name ?? old('course_name') }}" required autocomplete="course_name" autofocus>
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
            name="course_code" value=" {{ $course->course_code ??  old('course_code') }} " required autocomplete="course_code" autofocus>
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
            name="course_desc" value="{{ $course->course_desc ??  old('course_desc') }}" required autofocus>
        @error('course_desc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


{{-- <div class="form-group row">
    <label for="course_level" class="col-md-2 col-form-label text-md-right">Course_level</label>
    <div class="col-md-6">
        @foreach ($courses as $course)
        <div class="form-check">
            <input type="checkbox" name="courses_level" value="{{$course->course_level}}">
@if($course->course_level->pluck ('id')contains($course->course_level)) checked
@endif>
<label> {{ $course->course_level }} </label>
</div>
@endforeach
</div>
</div> --}}

<div class="form-group row">
    <label for="course_level" class="col-md-2 col-form-label text-md-right"> Course
        Level </label>
    <div class="col-md-6">
        <input id="course_level" type="text" class="form-control @error('course_level') is-invalid @enderror"
            name="course_level" value="{{ $course->course_level ??  old('course_level') }}" required autofocus>
        @error('course_level')
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
            name="course_image" value="{{ $course->course_image ??  old('course_image') }}" required autofocus>
        @error('course_image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

