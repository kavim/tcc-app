@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Dados</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('app.profile.update.experiences') }}" method="POST">

                            @csrf

                            <div class="mb-3">
                                <textarea class="form-control" id="summernote" name="experiences">
                                    {{ old('experiences') ? $experiences : trans('sentences.discribe_here_your_experiences') }}
                                </textarea>
                            </div>

                            <button  type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('scripts')
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
