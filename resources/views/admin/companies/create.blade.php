@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{__('admin.create_new_company')}}</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body p-2">
                        <form action="{{ route('admin.companies.store') }}" method="POST">
                            @csrf

                            @include('admin.companies._form')
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