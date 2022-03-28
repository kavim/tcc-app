@extends('layouts.web')
@section('content')

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-8 col-md-2">
                    <img src="{{ asset('images/Hiring-pana.svg') }}" alt="" class="img-fluid header-img">
                </div>
                <div class="col-12 col-md-10">
                    <div class="masthead-subheading">{{ trans('sentences.jobs_page') }}</div>
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

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aplicar Filtro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Selecione um Curso</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                </ul>
                                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Pesquisar</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-6 p-3">
                    <a href="{{ route('posts.show', $post->id) }}" style="text-decoration: none;">
                        <div class="card w-95">
                            <img src="{{ $post->featured_image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->subtitle }}</p>

                                <button class="btn btn-outline-primary">Ver detalhes</button>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
