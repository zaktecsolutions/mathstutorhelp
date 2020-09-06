<div class="form-group row">
    <label for="ans1_body" class="col-md-2 col-form-label text-md-right"> Answer 1 Body</label>
    <div class="col-md-8">
        <input id="ans1_body" type="text" class="form-control @error('ans1_body') is-invalid @enderror" name="ans1_body"
            value=" {{ $answer->ans1_body ?? '' }} " required autocomplete="ans1_body" autofocus>
        @error('ans1_body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans1_b" class="col-md-2 col-form-label text-md-right"> Answer 1 Before </label>
    <div class="col-md-8">
        <input id="ans1_b" type="text" class="form-control @error('ans1_b') is-invalid @enderror" name="ans1_b"
            value=" {{ $answer->ans1_b ?? '' }} " required autocomplete="ans1_b" autofocus>
        @error('ans1_b')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans1_a" class="col-md-2 col-form-label text-md-right"> Answer 1 After </label>
    <div class="col-md-8">
        <input id="ans1_a" type="text" class="form-control @error('ans1_a') is-invalid @enderror" name="ans1_a"
            value=" {{ $answer->ans1_a ?? '' }} " required autocomplete="ans1_a" autofocus>
        @error('ans1_a')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans2_body" class="col-md-2 col-form-label text-md-right"> Answer 2 Body </label>
    <div class="col-md-8">
        <input id="ans2_body" type="text" class="form-control @error('ans2_body') is-invalid @enderror" name="ans2_body"
            value=" {{ $answer->ans2_body ?? '' }} " required autocomplete="ans2_body" autofocus>
        @error('ans2_body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans2_b" class="col-md-2 col-form-label text-md-right"> Answer 2 Before </label>
    <div class="col-md-8">
        <input id="ans2_b" type="text" class="form-control @error('ans2_b') is-invalid @enderror" name="ans2_b"
            value=" {{ $answer->ans2_b ?? '' }} " required autocomplete="ans2_b" autofocus>
        @error('ans2_b')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans2_a" class="col-md-2 col-form-label text-md-right"> Answer 2 After </label>
    <div class="col-md-8">
        <input id="ans2_a" type="text" class="form-control @error('ans2_a') is-invalid @enderror" name="ans2_a"
            value=" {{ $answer->ans2_a ?? '' }} " required autocomplete="ans2_a" autofocus>
        @error('ans2_a')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans3_body" class="col-md-2 col-form-label text-md-right"> Answer 3  </label>
    <div class="col-md-8">
        <input id="ans3_body" type="text" class="form-control @error('ans3_body') is-invalid @enderror" name="ans3_body"
            value=" {{ $answer->ans3_body ?? '' }} " required autocomplete="ans3_body" autofocus>
        @error('ans3_body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans3_body" class="col-md-2 col-form-label text-md-right"> Question Code  </label>
    <div class="col-md-8">
        <input id="ans3_body" type="text" class="form-control @error('ans3_body') is-invalid @enderror" name="ans3_body"
            value=" {{ $answer->ans3_body ?? '' }} " required autocomplete="ans3_body" autofocus>
        @error('ans3_body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans_explanation" class="col-md-2 col-form-label text-md-right ">Answer Explanation</label>
    <div class="col-md-8">
        <input id="ans_explanation" type="text" class="form-control @error('ans_explanation') is-invalid @enderror"
            name="ans_explanation" value="{{ $answer->ans_explanation ?? '' }}" required autofocus>
        @error('ans_explanation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans_image" class="col-md-2 col-form-label text-md-right">Answer Image</label>
    <div class="col-md-8">
        <input id="ans_image" type="file" class="form-control @error('ans_image') is-invalid @enderror" name="ans_image"
            } autocomplete="ans_image" autofocus>
        @error('ans_image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans_correct" class="col-md-2 col-form-label text-md-right ">Is Correct</label>
    <div class="col-md-8">
        <div class="form-check">
            <input type="radio" name="ans_correct" value="1" @if(!empty($answer) && $answer->ans_correct) checked
            @endif>
            <label> Yes </label>
        </div>
        <div class="form-check">
            <input type="radio" name="ans_correct" value="0" @if(!empty($answer) && !$answer->ans_correct) checked
            @endif>
            <label> No </label>
        </div>
        @error('ans_correct')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>