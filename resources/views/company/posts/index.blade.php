@extends('layouts.company')

@section('content')

    <h1>Minhas vagas</h1>


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('admin.companies') }}</h1>
        <a href="{{ route('company.posts.create') }}" class="btn btn-success btn-lg shadow-sm"><i
                class="fas fa-plus fa-sm"></i></a>
    </div>

    @if(Session::has('msg'))
        <div class="alert alert-success text-center">
            <h4 class="mt-2">{{ Session::get('msg') }}</h4>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-warning text-center">
            <h4 class="mt-2">{{ Session::get('error') }}</h4>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" style="width:100%">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>logo</th>
                        <th>title</th>
                        <th>description</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>logo</th>
                        <th>title</th>
                        <th>description</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><img src="{{ $post->getFeaturedImage() }}" width="60"></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>
                                <a href="{{ route('company.posts.edit', $post->id) }}" class="btn btn-default m-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontró nada, lo siento",
                    "info": "Mostrando página _PAGE_ of _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)"
                }
            });
        });

    </script>
@endsection
