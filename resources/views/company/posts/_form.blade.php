<div class="form-row">
    <strong>{{ __('sentences.visibilty') }}: &nbsp;&nbsp;</strong>
    <div class="col-6">
        <div class="custom-control custom-checkbox">
            <input name="published" type="checkbox" class="custom-control-input" id="customCheck1"
            @if(isset($post->published))
                {{ old('published') == 'on' || $post->published == 1 ? 'checked' : '' }}
            @else
                {{ old('published') == 'on' ? 'checked' : '' }}
            @endif>
            <label class="custom-control-label" for="customCheck1">{{ __('sentences.publish') }}</label>
        </div>
    </div>
</div>
<hr>
<div class="form-row">
    <strong>Featured image</strong>
    <hr>
    <div class="col-12 p-0 thecontainer text-center">
        <div class="tag">
            <label for="file-upload" class="btn btn-success mt-2">
                <i class="fas fa-edit"></i>Alterar
            </label>
            <input id="file-upload" type="file" name="image" accept="image/jpeg, image/jpg, image/png"/>
        </div>
        <img id="preview-image" src="{{ $cover ?? '' }}" width="400">
    </div>
</div>

<br>

<strong>Post data</strong>
<hr>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="title">Title</label>
        <input name="title" type="text" class="form-control" id="title" placeholder="title to jobs" value="{{ old('title') ?? $post->title ?? '' }}">
    </div>
    <div class="form-group col-md-6">
        <label for="short_description">short_description</label>
        <input name="description" type="text" class="form-control" id="short_description" placeholder="short_description" value="{{ old('description') ?? $post->description ?? '' }}">
    </div>
</div>

<br>

<div class="form-group">
    <textarea class="form-control" id="summernote" name="body">
        {{ old('body') ?? $post->body ?? 'body' }}
    </textarea>
</div>

<br>

<strong>Course</strong>
<hr>
<div class="form-group">
    <label for="company_id"></label>
    <select class="form-control" id="course_id" name="course_id">
        <option value="">Select a course</option>
            @foreach ($courses as $course)
                <option @if(isset($post) && $course->id == $post->course_id) selected @endif value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
</div>

<button type="submit" class="btn btn-primary">Save</button>

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#file-upload').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 400,
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    </script>
@endsection

