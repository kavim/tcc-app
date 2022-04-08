@extends('layouts.web')
@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-8 col-md-2">
                    <img src="{{ asset('images/Meeting-amico.svg') }}" alt="" class="img-fluid header-img">
                </div>
                <div class="col-12 col-md-10">
                    <div class="masthead-subheading">{{ trans('sentences.staudants_page') }}</div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-12 pt-3 pt-md-5">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-funnel"></i> Filtro
                </button>

                @if(isset($course_id) || isset($search_string))
                <a class="btn btn-outline-primary" href="{{ route('students') }}"> <i class="bi bi-x-circle"></i> {{ __('sentences.clear') }}</a>

                @endif

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aplicar Filtro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('students') }}">
                            <div class="modal-body">
                                <div class="input-group mb-3">

                                        <select  class="form-control" name="course_id" id="course_id">
                                            <option value="">{{ __('sentences.select_course') }}</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>

                                        <br>
                                        <br>

                                        <input name="search_string" type="text" class="form-control" placeholder="Pesquisar por usuario">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 my-3">
            @foreach ($students as $user)
                <div class="col">
                    <div class="card h-100 text-center" style="cursor: pointer;">
                        <a href="{{ route('students.show', $user->slug_name) }}" style="text-decoration: none;">
                            <img src="{{ $user->student->getCover() }}" class="card-img-top" alt="{{ $user->student->getCover() }}">
                            <img src="{{ $user->student->getAvatar() }}" class="card_avatar rounded rounded-circle" alt="{{ $user->student->getAvatar() }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">{{ $user->student->bio }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
