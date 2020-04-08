<div class="form-group row">
    <label for="exam_name" class="col-md-2 col-form-label text-md-right">exam Name</label>
    <div class="col-md-8">
        <input id="exam_name" type="exam_name" class="form-control @error('exam_name') is-invalid @enderror"
            name="exam_name" value="{{$exam->exam_name ?? '' }}" required autocomplete="exam_name" autofocus>
        @error('exam_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="exam_code" class="col-md-2 col-form-label text-md-right"> exam Code</label>
    <div class="col-md-8">
        <input id="exam_code" type="text" class="form-control @error('exam_code') is-invalid @enderror" name="exam_code"
            value=" {{ $exam->exam_code ?? '' }} " required autocomplete="exam_code" autofocus>
        @error('exam_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="exam_desc" class="col-md-2 col-form-label text-md-right">exam Description</label>
    <div class="col-md-8">
        <input id="exam_desc" type="text" class="form-control @error('exam_desc') is-invalid @enderror" name="exam_desc"
            value="{{ $exam->exam_desc ?? '' }}" required autofocus>
        @error('exam_desc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="exam_body" class="col-md-2 col-form-label text-md-right"> Exam Body </label>
    <div class="col-md-6">
        <input id="exam_body" type="text" class="form-control @error('exam_body') is-invalid @enderror" name="exam_body"
            value="{{ $exam->exam_body ?? '' }}" required autofocus>
        @error('exam_body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="exam_level" class="col-md-2 col-form-label text-md-right"> Exam Level</label>
    <div class="col-md-6">
        <input id="exam_level" type="text" class="form-control @error('exam_level') is-invalid @enderror"
            name="exam_level" value="{{ $exam->exam_level ?? ''  }}" required autofocus>
        @error('exam_level')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>