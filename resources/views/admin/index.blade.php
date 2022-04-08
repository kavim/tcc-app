@extends('layouts.admin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <h1>DashBoard</h1>
            <p>Bem vindo, Administrador</p>
        </div>
    </div>

    @if(count($users) > 0)
    <div class="card shadow mb-4">
        <div class="card-body">
            <strong>Empresas que publicaram um post mais ainda não foram verificadas:</strong>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" style="width:100%">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->company->id }}</td>
                            <td>{{ $user->company->name }}</td>
                            <td>
                                <a href="{{ route('admin.companies.edit', $user->company->id) }}" class="btn btn-default m-1"><i
                                    class="fas fa-edit"></i></a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

@endsection
