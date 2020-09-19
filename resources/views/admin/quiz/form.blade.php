<div class="form-group row">
    <label for="quiz_name" class="col-md-2 col-form-label text-md-right">Quiz Name</label>
    <div class="col-md-8">
        <input id="quiz_name" type="quiz_name" class="form-control @error('quiz_name') is-invalid @enderror" name="quiz_name" value="{{$quiz->quiz_name ??  old('quiz_name')  }}" required autocomplete="quiz_name" autofocus>
        @error('quiz_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="quiz_code" class="col-md-2 col-form-label text-md-right"> Quiz Code</label>
    <div class="col-md-8">
        <input id="quiz_code" type="text" class="form-control @error('quiz_code') is-invalid @enderror" name="quiz_code" value=" {{ $quiz->quiz_code ??  old('quiz_code') }} " required autocomplete="quiz_code" autofocus>
        @error('quiz_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="quiz_desc" class="col-md-2 col-form-label text-md-right">Quiz Description</label>
    <div class="col-md-8">
        <input id="quiz_desc" type="text" class="form-control @error('quiz_desc') is-invalid @enderror" name="quiz_desc" value="{{ $quiz->quiz_desc ??  old('quiz_desc')  }}" required autofocus>
        @error('quiz_desc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


@if($lesson->id != null)
<input type="hidden" name="lesson_id" value="{{$lesson->id}}" />
<input type="hidden" name="quiz_type" value="Lesson" />
@elseif($topic->id != null)
<input type="hidden" name="topic_id" value="{{$topic->id}}" />
<input type="hidden" name="quiz_type" value="Topic" />
@elseif($course->id != null)
<input type="hidden" name="course_id" value="{{$course->id}}" />
<input type="hidden" name="quiz_type" value="Course" />
@endif

<div class="form-group row">
    <label for="quiz_subtype" class="col-md-2 col-form-label text-md-right"> Quiz SubType </label>
    <div class="col-md-6">
        @php
        $quiz_subtype = $quiz->quiz_subtype ??old('quiz_subtype');
        @endphp
        <select id="quiz_subtype" name="quiz_subtype" class="form-control @error('quiz_subtype') is-invalid @enderror">
            <option {{$quiz_subtype == 'diagnostic' ? 'selected' :'' }} value="diagnostic">Diagnostic</option>
            <option {{$quiz_subtype == 'summary' ? 'selected' :'' }} value="summary">Summary</option>
            <option {{$quiz_subtype == 'ExamEdexcel' ? 'selected' :'' }} value="ExamEdexcel">ExamEdexcel</option>
        </select>
        @error('quiz_subtype')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="calculator" class="col-md-2 col-form-label text-md-right ">Calculator Allowed </label>
    <div class="col-md-8">
        <div class="form-check">
            <input type="radio" name="calculator" value="1" @if(!empty($quiz) && $quiz->calculator) checked
            @endif>
            <label> Yes </label>
        </div>
        <div class="form-check">
            <input type="radio" name="calculator" value="0" @if(!empty($quiz) && !$quiz->calculator) checked
            @endif>
            <label> No </label>
        </div>
        @error('calculator')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>