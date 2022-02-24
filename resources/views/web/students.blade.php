@extends('layouts.web')
@section('content')

    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ trans('sentences.staudants_page') }}</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

    <div class="container">
        <div class="row">
            @foreach ($students as $user)
                <div class="col-md-6 p-3">
                    <a href="{{ route('web.students.show', $user->slug_name) }}" style="text-decoration: none;">
                        <div class="p-3 text-center border" style="cursor: pointer;">
                            <img src="{{ $user->student->getAvatar() }}" alt="{{ $user->student->getAvatar() }}" class="img-fluid rounded rounded-circle">
                            <h2>{{ $user->name }}</h2>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
