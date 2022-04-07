@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('sentences.social_networks') }}</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('app.profile.update.social_networks') }}">

                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <strong>Redes</strong>
                                            @foreach($social_networks as $key => $rede)
                                                <div class="row mb-3">
                                                    <label for="social_networks_{{ $key }}"
                                                        class="col-md-4 col-form-label text-md-end">{{ $key }}</label>

                                                    <div class="col-md-6">

                                                        <input id="social_networks_{{ $key }}" type="text" class="form-control"
                                                            name="{{ 'social_networks['.$key.']' }}" value="{{ $social_networks[$key] }}"
                                                            placeholder="{{$key}}">

                                                        @error('social_networks')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                    </div>
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
