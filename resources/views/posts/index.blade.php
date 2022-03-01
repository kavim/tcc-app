@extends('layouts.app')
@section('content')

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">{{ trans('sentences.jobs_page') }}</div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 p-3">
                    <a href="{{ route('posts.show', $post->id) }}" style="text-decoration: none;">
                        <div class="card w-95">
                            <img src="{{ $post->featured_image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->subtitle }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
