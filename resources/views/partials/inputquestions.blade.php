<div class="form-group row">
    <label for="question_name" class="col-md-2 col-form-label text-md-right">question Name</label>
    <div class="col-md-8">
        <input id="question_name" type="question_name" class="form-control @error('question_name') is-invalid @enderror"
            name="question_name" value="{{$question->question_name ?? '' }}" required autocomplete="question_name"
            autofocus>
        @error('question_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="question_body" class="col-md-2 col-form-label text-md-right"> Question body</label>
    <div class="col-md-8">
        <input id="question_body" type="text" class="form-control @error('question_body') is-invalid @enderror"
            name="question_body" value=" {{ $question->question_body ?? '' }} " required autocomplete="question_body"
            autofocus>
        @error('question_body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="question_image" class="col-md-2 col-form-label text-md-right">Question Image</label>
    <div class="col-md-8">
        <input id="question_image" type="text" class="form-control @error('question_image') is-invalid @enderror"
            name="question_image" value="{{ $question->question_image ?? '' }}" required autofocus>
        @error('question_image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans_body" class="col-md-2 col-form-label text-md-right"> Answer Body </label>
    <div class="col-md-6">
        <input id="ans_body" type="text" class="form-control @error('ans_body') is-invalid @enderror" name="ans_body"
            value="{{ $question->ans_body ?? '' }}" required autofocus>
        @error('ans_body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans_explanation" class="col-md-2 col-form-label text-md-right"> Answer Explanation </label>
    <div class="col-md-6">
        <input id="ans_explanation" type="text"
            class="form-control @error('ans_explanation') is-invalid @enderror" name="ans_explanation"
            value="{{ $question->ans_explanation ?? ''  }}" required autofocus>
        @error('ans_explanation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
