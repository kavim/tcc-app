@extends('layouts.web')
@section('content')
    <!-- Masthead-->
    <header class="masthead">
        {{ $post->title }}
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12 my-3 text-center">
                <h2>{{ $post->title }}</h2>
            </div>
        </div>
    </div>

@endsection
