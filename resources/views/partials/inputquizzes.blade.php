<div class="form-group row">
    <label for="quiz_name" class="col-md-2 col-form-label text-md-right">Quiz Name</label>
    <div class="col-md-8">
        <input id="quiz_name" type="quiz_name" class="form-control @error('quiz_name') is-invalid @enderror"
            name="quiz_name" value="{{$quiz->quiz_name ?? '' }}" required autocomplete="quiz_name" autofocus>
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
        <input id="quiz_code" type="text" class="form-control @error('quiz_code') is-invalid @enderror" name="quiz_code"
            value=" {{ $quiz->quiz_code ?? '' }} " required autocomplete="quiz_code" autofocus>
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
        <input id="quiz_desc" type="text" class="form-control @error('quiz_desc') is-invalid @enderror" name="quiz_desc"
            value="{{ $quiz->quiz_desc ?? '' }}" required autofocus>
        @error('quiz_desc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="quiz_type" class="col-md-2 col-form-label text-md-right"> Quiz Type</label>
    <div class="col-md-6">
        <input id="quiz_type" type="text" class="form-control @error('quiz_type') is-invalid @enderror"
            name="quiz_type" value="{{ $quiz->quiz_type ?? ''  }}" required autofocus>
        @error('quiz_type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="quiz_body" class="col-md-2 col-form-label text-md-right"> Quiz Body </label>
    <div class="col-md-6">
        <input id="quiz_body" type="text" class="form-control @error('quiz_body') is-invalid @enderror" name="quiz_body"
            value="{{ $quiz->quiz_body ?? '' }}" required autofocus>
        @error('quiz_body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="quiz_level" class="col-md-2 col-form-label text-md-right"> quiz Level</label>
    <div class="col-md-6">
        <input id="quiz_level" type="text" class="form-control @error('quiz_level') is-invalid @enderror"
            name="quiz_level" value="{{ $quiz->quiz_level ?? ''  }}" required autofocus>
        @error('quiz_level')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
