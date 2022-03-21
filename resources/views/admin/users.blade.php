@extends('layouts.admin')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuários</h1>
        {{-- <a href="{{ route('admin.users.create') }}" class="btn btn-success shadow-sm"><i class="fas fa-plus fa-sm"></i></a> --}}
    </div>

    @if(Session::has('msg'))
        <div class="alert alert-success text-center">
            <h4 class="mt-2">{{ Session::get('msg') }}</h4>
        </div>
    @endif

    <div class="row">
        <div class="col-12 mt-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Ativo?</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $u)
                        <tr @if($u->active == 0) class="bg-dark text-light" @endif>
                            <th scope="row">{{ $u->id }}</th>
                            <td>{{ Str::limit($u->name, 50, $end='...') }}</td>
                            <td>{{ $u->type->name }}</td>
                            <td>@if($u->active == 1) Sim @else Não @endif</td>
                            <td>
                                {{-- <a href="{{ route('admin.users.show', $u->id) }}" class="btn btn-primary m-1"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-warning m-1"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.users.active', $u->id) }}" class="btn btn-danger m-1"><i class="fas fa-trash"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
