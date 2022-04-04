@extends('layouts.company')

@section('content')

    <h1>Minhas vagas</h1>


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('admin.companies') }}</h1>
        <a href="{{ route('admin.companies.create') }}" class="btn btn-success btn-lg shadow-sm"><i
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
                        <th>name</th>
                        <th>email</th>
                        <th>verified</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>logo</th>
                        <th>name</th>
                        <th>email</th>
                        <th>verified</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td><img src="{{ $company->getAvatar() }}" alt="{{ $company->getAvatar() }}" width="60"></td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->isVerified() }}</td>
                            <td>
{{--                                <a href="{{ route('admin.companies.show', $company->id) }}" class="btn btn-primary m-1"><i--}}
{{--                                        class="fas fa-eye"></i></a>--}}
{{--                                <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-warning m-1"><i--}}
{{--                                        class="fas fa-edit"></i></a>--}}
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
