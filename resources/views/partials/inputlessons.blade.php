<div class="form-group row">
    <label for="lesson_name" class="col-md-2 col-form-label text-md-right">lesson Name</label>
    <div class="col-md-8">
        <input id="lesson_name" type="lesson_name" class="form-control @error('lesson_name') is-invalid @enderror"
            name="lesson_name" value="{{$lesson->lesson_name ?? '' }}" required autocomplete="lesson_name" autofocus>
        @error('lesson_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="lesson_code" class="col-md-2 col-form-label text-md-right"> lesson Code</label>
    <div class="col-md-8">
        <input id="lesson_code" type="text" class="form-control @error('lesson_code') is-invalid @enderror"
            name="lesson_code" value=" {{ $lesson->lesson_code ?? '' }} " required autocomplete="lesson_code" autofocus>
        @error('lesson_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="lesson_desc" class="col-md-2 col-form-label text-md-right">lesson Description</label>
    <div class="col-md-8">
        <input id="lesson_desc" type="text" class="form-control @error('lesson_desc') is-invalid @enderror"
            name="lesson_desc" value="{{ $lesson->lesson_desc ?? '' }}" required autofocus>
        @error('lesson_desc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="lesson_ws" class="col-md-2 col-form-label text-md-right"> Lesson Worksheet </label>
    <div class="col-md-6">
        <input id="lesson_ws" type="text" class="form-control @error('lesson_ws') is-invalid @enderror"
            name="lesson_ws" value="{{ $lesson->lesson_ws ?? '' }}" required autofocus>
        @error('lesson_ws')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="lesson_body" class="col-md-2 col-form-label text-md-right"> Lesson Body</label>
    <div class="col-md-6">
        <input id="lesson_body" type="text" class="form-control @error('lesson_body') is-invalid @enderror"
            name="lesson_body" value="{{ $lesson->lesson_body ?? ''  }}" required autofocus>
        @error('lesson_body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="lesson_quiz" class="col-md-2 col-form-label text-md-right"> Lesson Quiz</label>
    <div class="col-md-6">
        <input id="lesson_quiz" type="text" class="form-control @error('lesson_body') is-invalid @enderror"
            name="lesson_quiz" value="{{ $lesson->lesson_quiz ?? ''  }}" required autofocus>
        @error('lesson_quiz')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>