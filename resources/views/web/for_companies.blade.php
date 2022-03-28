@extends('layouts.web')
@section('content')

<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-8 col-md-2">
                <img src="{{ asset('images/Meeting-pana.svg') }}" alt="" class="img-fluid header-img">
            </div>
            <div class="col-12 col-md-10">
                <div class="masthead-subheading">{{ trans('sentences.for_companies') }}</div>
                <h2 class="section-heading text-uppercase">Publique uma vaga</h2>
            </div>
        </div>
    </div>
</header>

<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h3 class="section-subheading text-muted">Cadastre tua empresa na Probi e publique uma vaga!</h3>
        </div>
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="card mb-3">
                        <div class="card-header">
                            {{ trans('sentences.company_details') }}
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">{{ trans('sentences.trade_name') }}</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">{{ trans('sentences.field_of_activity') }}</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">{{ trans('sentences.company_email') }}:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">{{ trans('sentences.company_phone') }}</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <br>
                                    <img id="preview-image" src="{{ asset('images/default-img.jpg') }}"
                                        alt="preview image" style="max-height: 200px; max-width: 200px">
                                    <br>
                                    <label for="image" class="form-label">{{ trans('sentences.company_logo') }} (300x300)</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            {{ trans('sentences.company_user') }}
                        </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#image').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endsection
