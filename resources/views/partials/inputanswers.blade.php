<div class="form-group row">
    <label for="ans_image" class="col-md-2 col-form-label text-md-right">Answer Image</label>
    <div class="col-md-8">
        <input id="ans_image" type="ans_image" class="form-control @error('ans_image') is-invalid @enderror"
            name="ans_image" value="{{$answer->ans_image ?? '' }}" required autocomplete="ans_image" autofocus>
        @error('ans_image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ans_body" class="col-md-2 col-form-label text-md-right"> Answer Body</label>
    <div class="col-md-8">
        <input id="ans_body" type="text" class="form-control @error('ans_body') is-invalid @enderror"
            name="ans_body" value=" {{ $answer->ans_body ?? '' }} " required autocomplete="ans_body" autofocus>
        @error('ans_body')
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
            name="ans_explanation"   value="{{ $answer->ans_explanation ?? '' }}" required autofocus>
        @error('ans_explanation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>




