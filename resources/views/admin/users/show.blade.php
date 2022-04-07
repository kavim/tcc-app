@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $user->name }} # {{ $user->id }}</h1>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('admin.users.verify', $user->id) }}" class="btn btn-success btn-icon-split mt-3 mr-3">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-check"></i>
                    </span>
                    <span class="text">{{ __('sentences.verify_student_academic_email') }}</span>
                </a>

                <a href="{{ route('admin.users.block', $user->id) }}" class="btn @if($user->block) btn-success @else btn-danger @endif btn-icon-split mt-3">

                    @if($user->block)
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-unlock"></i>
                    </span>
                    <span class="text">{{ __('sentences.unblock_user') }}</span>
                    @else
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <span class="text">{{ __('sentences.block_user') }}</span>
                    @endif

                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body p-2">
                        <b>User Data</b>
                        <table class="table table-sm table-bordered">
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            </tbody>
                        </table>

                        @if($user->user_type_id == $user::COMPANY)
                            <b>COMPANY Data</b>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                <tr>
                                    <td>NOME</td>
                                    <td>{{ $user->company->phone }}</td>
                                </tr>
                                <tr>
                                    <td>email</td>
                                    <td>{{ $user->company->email }}</td>
                                </tr>
                                <tr>
                                    <td>verified</td>
                                    <td>
                                        @if($user->company->verified)
                                            ativo
                                        @else
                                            pendente de ativação
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>bio</td>
                                    <td>{{ $user->company->bio }}</td>
                                </tr>
                                </tbody>
                            </table>
                        @endif

                        @if($user->user_type_id == 4)
                            <b>Student Data</b>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                <tr>
                                    <td>phone</td>
                                    <td>{{ $user->student->phone }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('sentences.academic_institution_email') }}</td>
                                    <td>{{ $user->student->academic_institution_email }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('sentences.is_academic_institution_email_verified') }}</td>
                                    <td>
                                        @if($user->student->is_academic_institution_email_verified)
                                            ativo
                                        @else
                                            pendente de ativação
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
