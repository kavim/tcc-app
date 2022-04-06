@extends('layouts.web')
@section('content')

<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-8 col-md-2">
                <img src="{{ asset('images/Meeting-pana.svg') }}" alt="" class="img-fluid header-img">
            </div>
            <div class="col-12 col-md-10">
                <div class="masthead-subheading">{{ trans('sentences.for_companies') }}</div>
                <h2 class="section-heading text-uppercase">Publique uma vaga</h2>
            </div>
        </div>
    </div>
</header>

<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h5>Cadastre tua empresa na Probi e publique uma vaga!</h5>
            <ul class="nav nav-pills mt-5 mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ trans('sentences.register_now') }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ trans('sentences.already_have_an_account') }}</button>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12">
                <x-app.alerts></x-app.alerts>
            </div>
            <div class="col-12">
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form action="{{ route('for_companies.register') }}" method="POST">
                            @csrf

                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('sentences.company_details') }}
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleInputEmail1" class="form-label">{{ trans('sentences.trade_name') }}</label>
                                            <input name="trade_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('trade_name') }}">
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1" class="form-label">{{ trans('sentences.field_of_activity') }}</label>
                                            <input name="bio" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('bio') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleInputEmail1" class="form-label">{{ trans('sentences.company_email') }}:</label>
                                            <input name="company_email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('company_email') }}">
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1" class="form-label">{{ trans('sentences.company_phone') }}</label>
                                            <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('phone') }}">
                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col">--}}
{{--                                            <br>--}}
{{--                                            <img id="preview-image" src="{{ asset('images/default-img.jpg') }}"--}}
{{--                                                alt="preview image" style="max-height: 200px; max-width: 200px">--}}
{{--                                            <br>--}}
{{--                                            <label for="image" class="form-label">{{ trans('sentences.company_logo') }} (300x300)</label>--}}
{{--                                            <input class="form-control" type="file" id="image" name="image">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('sentences.company_user') }}
                                </div>
                                <div class="card-body">

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    {{-- <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nome do responsavel</label>
                                        <input name="name" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="{{ trans('sentences.name') }}"s value="{{ old('name') }}">
                                        <div id="nameHelp" class="form-text">{{ trans('sentences.not_share_company_email') }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email do responsavel</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ trans('sentences.email') }}" value="{{ old('email') }}">
                                        <div name="email" id="emailHelp" class="form-text">{{ trans('sentences.not_share_company_email') }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="{{ trans('sentences.password') }}">
                                    </div> --}}
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card">
                            <div class="card-header">{{ __('Login') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <a href="{{ route('linkedinlogin', 'linkedin') }}">
                                                {{ __('Login with LinkedIn') }}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
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
