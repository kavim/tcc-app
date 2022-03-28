@extends('layouts.web')
@section('content')
    <!-- Masthead-->
    <header class="post-header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="post-header-heading text-uppercase">{{ $post->title }}</div>
                    <div>
                        <div class="d-flex align-items-center">
                            <img src="{{ $post->user->company->getAvatar() }}" alt="" width="25" class="rounded rounded-circle">
                            &nbsp;
                            <span>{{ $post->user->company->name }}</span>
                            &nbsp;
                            |
                            &nbsp;
                            <span>published_at: {{ $post->published_at }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="">
                        <img class="img-fluid custom-rounded" src="{{ $post->getFeaturedImage() }}" alt="{{ $post->feautured_image }}">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <div class="post-subtitle">
                    <span>{{$post->description}}</span>
                </div>
                <hr>
                <div class="post-content">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </div>
@endsection
