@extends('layouts.app')
@section('content')
    <!-- Masthead-->
    <header class="masthead avatar-header">
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div style="background-image: url('{{ $user->student->getAvatar() }}');" class="avatar mx-auto"></div>
            </div>
            <div class="col-12 my-3 text-center">
                <h2>{{ $user->name }}</h2>
                <p>{{ $user->student->bio }}</p>
            </div>
            <div class="col-12 my-3">
                <div class="row">
                    <div class="col-6 d-flex justify-content-around">
                        @foreach ($user->student->social_networks as $key => $item)
                            <a href="{{ $item }}"> {!! config('custom.social_networks_icons')[$key] !!}</a>
                        @endforeach
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        @if ($user->student->open_to_work)
                            <button type="button" class="btn btn-primary position-relative">
                                Profile
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">{{ trans('sentences.opem_to_work') }}</span>
                                </span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 my-3 p-2">
                <p>{!! $user->student->resume !!}</p>
            </div>
        </div>
    </div>

@endsection
@section('styles')
    <style>
        .avatar-header {
            padding-top: 20rem;
            text-align: center;
            background-color: #5f4dee;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.7) 100%), url('{{ $user->student->getCover() }}');
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: scroll;
        }
    </style>
@endsection
