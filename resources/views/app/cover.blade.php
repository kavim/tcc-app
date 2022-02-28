@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Cover</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" id="image-upload-preview"
                            action="{{ route('app.profile.edit.cover') }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="file" name="image" placeholder="Choose image" id="image">
                                        @error('image')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <img id="preview-image" src="{{ auth()->user()->student->getCover() }}"
                                        alt="preview image" style="max-height: 250px;">
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $('#image').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endsection
