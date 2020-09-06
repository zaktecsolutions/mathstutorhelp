
<div class="form-group row">
    <label for="question_name" class="col-md-2 col-form-label text-md-right"> Question Name</label>
    <div class="col-md-8">
        <input id="question_name" type="text" class="form-control @error('question_body') is-invalid @enderror"
            name="question_name" value=" {{ $question->question_name ?? old('question_name')  }} " required
            autocomplete="question_name" autofocus>
        @error('question_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="question_body" class="col-md-2 col-form-label text-md-right">Question Body</label>
    <div class="col-md-8">
        <textarea rows="3" id="question_body" class="form-control @error('question_body') is-invalid @enderror"
            name="question_body" required autocomplete="question_body"
            autofocus>{{$question->question_body ?? old('question_body') }}</textarea>
        @error('question_body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="question_code" class="col-md-2 col-form-label text-md-right">Question Code</label>
    <div class="col-md-8">
        <textarea rows="1" id="question_code" class="form-control @error('question_code') is-invalid @enderror"
            name="question_code" required autocomplete="question_code"
            autofocus>{{$question->question_code ?? old('question_code') }}</textarea>
        @error('question_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="question_mark" class="col-md-2 col-form-label text-md-right"> Question Mark </label>
    <div class="col-md-6">
        <input id="question_mark" type="number" min="0" size="1" max="9" placeholder="1"
            class="form-control @error('question_mark') is-invalid @enderror" name="question_mark"
            value="{{ $question->question_mark ?? old('question_mark')  }}" required autofocus>
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
        <input id="question_grade" type="number" min="0" size="1" max="9" placeholder="1" class="form-control @error('question_grade') is-invalid @enderror"
            name="question_grade" value="{{ $question->question_grade ?? old('question_grade')  }}" required autofocus>
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
        <input id="question_type" type="text" class="form-control @error('question_type') is-invalid @enderror"
            name="question_type" value="{{ $question->question_type ?? old('question_type')  }}" autofocus>
        @error('question_type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="question_image" class="col-md-2 col-form-label text-md-right">Question Image</label>
    <div class="col-md-8">
        <input id="question_image" type="file" class="form-control @error('question_image') is-invalid @enderror" name="question_image"
            } autocomplete="question_image" autofocus>
        @error('question_image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  

<div class="form-group row">
    <label for="q_calculator" class="col-md-2 col-form-label text-md-right ">Calculator Allowed </label>
    <div class="col-md-8">
        <div class="form-check">
            <input type="radio" name="q_calculator" value="1" @if(!empty($question) && $question->q_calculator) checked
            @endif>
            <label> Yes </label>
        </div>
        <div class="form-check">
            <input type="radio" name="q_calculator" value="0" @if(!empty($question) && !$question->q_calculator) checked
            @endif>
            <label> No </label>
        </div>
        @error('q_calculator')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

