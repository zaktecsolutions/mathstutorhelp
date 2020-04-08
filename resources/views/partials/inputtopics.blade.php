<div class="form-group row">
    <label for="topic_name" class="col-md-2 col-form-label text-md-right">topic Name</label>
    <div class="col-md-8">
        <input id="topic_name" type="topic_name" class="form-control @error('topic_name') is-invalid @enderror"
            name="topic_name" value="{{$topic->topic_name ?? '' }}" required autocomplete="topic_name" autofocus>
        @error('topic_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="topic_code" class="col-md-2 col-form-label text-md-right"> topic Code</label>
    <div class="col-md-8">
        <input id="topic_code" type="text" class="form-control @error('topic_code') is-invalid @enderror"
            name="topic_code" value=" {{ $topic->topic_code ?? '' }} " required autocomplete="topic_code" autofocus>
        @error('topic_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="topic_desc" class="col-md-2 col-form-label text-md-right">topic Description</label>
    <div class="col-md-8">
        <input id="topic_desc" type="text" class="form-control @error('topic_desc') is-invalid @enderror"
            name="topic_desc" value="{{ $topic->topic_desc ?? '' }}" required autofocus>
        @error('topic_desc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="topic_les_num" class="col-md-2 col-form-label text-md-right"> Topic Lesson Number </label>
    <div class="col-md-6">
        <input id="topic_les_num" type="text" class="form-control @error('topic_les_num') is-invalid @enderror"
            name="topic_les_num" value="{{ $topic->topic_les_num ?? '' }}" required autofocus>
        @error('topic_les_num')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="topic_diagnostic_quiz" class="col-md-2 col-form-label text-md-right"> Topic Diagnostic Quiz</label>
    <div class="col-md-6">
        <input id="topic_diagnostic_quiz" type="text" class="form-control @error('topic_diagnostic_quiz') is-invalid @enderror"
            name="topic_diagnostic_quiz" value="{{ $topic->topic_diagnostic_quiz ?? ''  }}" required autofocus>
        @error('topic_diagnostic_quiz')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="topic_summary_quiz" class="col-md-2 col-form-label text-md-right"> Topic Summary Quiz</label>
    <div class="col-md-6">
        <input id="topic_summary_quiz" type="text" class="form-control @error('topic_diagnostic_quiz') is-invalid @enderror"
            name="topic_summary_quiz" value="{{ $topic->topic_summary_quiz ?? ''  }}" required autofocus>
        @error('topic_summary_quiz')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>