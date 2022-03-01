@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>{{ __('Login') }}</h1>
                    <p>You don't have a password? Then please <a class="white" href="sign-up.html">Sign Up</a></p>
                    <!-- Sign Up Form -->
                    <div class="form-container">
                        {{-- <form method="POST" action="{{ route('login') }}" id="logInForm" data-toggle="validator" data-focus="false"> --}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input name="email" type="email"
                                       class="form-control-input @error('email') is-invalid @enderror" id="lemail"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label class="label-control" for="lemail">{{ __('E-Mail Address') }}</label>

                                @error('email')
                                <div class="help-block with-errors">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input name="password" type="password"
                                       class="form-control-input @error('password') is-invalid @enderror" id="lpassword"
                                       autocomplete="current-password" required>
                                <label class="label-control" for="lpassword">{{ __('Password') }}</label>
                                <div class="help-block with-errors">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">{{ __('Login') }}</button>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-primary" href="{{ route('linkedinlogin', 'linkedin') }}">
                                    {{ __('Login with LinkedIn') }}
                                </a>
                            </div>

                            <div class="form-message">
                                <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
@endsection
