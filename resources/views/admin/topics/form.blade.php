<div class="form-group row">
    <label for="topic_name" class="col-md-2 col-form-label text-md-right">Topic Name</label>
    <div class="col-md-8">
        <input id="topic_name" type="topic_name" class="form-control @error('topic_name') is-invalid @enderror"
            name="topic_name" value="{{$topic->topic_name ??  old('topic_name')  }}" required autocomplete="topic_name" autofocus>
        @error('topic_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="topic_code" class="col-md-2 col-form-label text-md-right"> Topic Code</label>
    <div class="col-md-8">
        <input id="topic_code" type="text" class="form-control @error('topic_code') is-invalid @enderror"
            name="topic_code" value=" {{ $topic->topic_code ??  old('topic_code')  }} " required autocomplete="topic_code" autofocus>
        @error('topic_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="topic_desc" class="col-md-2 col-form-label text-md-right">Topic Description</label>
    <div class="col-md-8">
        <input id="topic_desc" type="text" class="form-control @error('topic_desc') is-invalid @enderror"
            name="topic_desc" value="{{ $topic->topic_desc ??  old('topic_desc')  }}" required autofocus>
        @error('topic_desc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="topic_index" class="col-md-2 col-form-label text-md-right"> Topic Index </label>
    <div class="col-md-6">
        <input id="topic_index" type="text" class="form-control @error('topic_index') is-invalid @enderror"
            name="topic_index" value="{{ $topic->topic_index ??  old('topic_index')  }}" required autofocus>
        @error('topic_index')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>