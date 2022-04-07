@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{__('admin.create_new_company')}}</h1>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('admin.companies.verify', $company->id) }}" class="btn @if($company->verified) btn-danger @else btn-success @endif btn-icon-split mt-3">

                    @if(!$company->verified)
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-unlock"></i>
                    </span>
                    <span class="text">{{ __('sentences.verify_company') }}</span>
                    @else
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <span class="text">{{ __('sentences.unverify_company') }}</span>
                    @endif

                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body p-2">
                        <form action="{{ route('admin.companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @include('admin.companies._form')

                            <div class="row">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary" type="submit">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#file-upload').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endsection
