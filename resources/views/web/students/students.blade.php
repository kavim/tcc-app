@extends('layouts.web')
@section('content')

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">{{ trans('sentences.staudants_page') }}</div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            @foreach ($students as $user)
                <div class="col-md-6 p-3">
                    <a href="{{ route('students.show', $user->slug_name) }}" style="text-decoration: none;">
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
