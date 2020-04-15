<div class="form-group row">
    <label for="question_name" class="col-md-2 col-form-label text-md-right">Question Name</label>
    <div class="col-md-8">
        <textarea rows="3" id="question_name" class="form-control @error('question_name') is-invalid @enderror"
            name="question_name" required autocomplete="question_name"
            autofocus>{{$question->question_name ?? '' }}</textarea>
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
    <label for="question_mark" class="col-md-2 col-form-label text-md-right"> Question Mark </label>
    <div class="col-md-6">
        <input id="question_mark" type="text" class="form-control @error('question_mark') is-invalid @enderror" name="question_mark"
            value="{{ $question->question_mark ?? '' }}" required autofocus>
        @error('question_mark')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="question_grade" class="col-md-2 col-form-label text-md-right"> Question Grade </label>
    <div class="col-md-6">
        <input id="question_grade" type="text"
            class="form-control @error('question_grade') is-invalid @enderror" name="question_grade"
            value="{{ $question->question_grade ?? ''  }}" required autofocus>
        @error('question_grade')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="question_type" class="col-md-2 col-form-label text-md-right"> Question Type </label>
    <div class="col-md-6">
        <input id="question_type" type="text"
            class="form-control @error('question_type') is-invalid @enderror" name="question_type"
            value="{{ $question->question_type ?? ''  }}" required autofocus>
        @error('question_type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="question_category" class="col-md-2 col-form-label text-md-right"> Question Category </label>
    <div class="col-md-6">
        <input id="question_category" type="text"
            class="form-control @error('question_category') is-invalid @enderror" name="question_category"
            value="{{ $question->question_category ?? ''  }}" required autofocus>
        @error('question_category')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>