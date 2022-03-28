@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"> --}}
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>

<script>
    $( "#datepicker" ).datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR"
    });
</script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Dados</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('app.profile.update') }}" method="POST">

                            @csrf

                            <div class="row">
                                <div class="col">
                                    <label for="name">{{ trans('sentences.name') }}</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="{{ trans('sentences.name') }}" value="{{ $user->email }}">
                                </div>
                                <div class="col">
                                    <label for="inputEmail4">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea name="bio" class="form-control" placeholder="{{ trans('sentences.bio_placeholder') }}" id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">@if(old('document')) {{old('enrollment')}} @else {{$user->student->bio}} @endif</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="enrollment">{{ trans('sentences.enrollment') }}</label>
                                    <input name="enrollment" type="text" class="form-control" id="enrollment" placeholder="123123123" value="@if(old('document')) {{old('enrollment')}} @else {{$user->student->enrollment}} @endif">
                                </div>
                                <div class="col">
                                    <label for="phone">{{ trans('sentences.phone') }}</label>
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="(00) 00000000" value="@if(old('phone')) {{old('phone')}} @else {{$user->student->phone}} @endif">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="document">{{ trans('sentences.document') }}</label>
                                    <input name="document" type="text" class="form-control" id="document" placeholder="000.000.000-00" value="@if(old('document')) {{old('document')}} @else {{$user->student->document}} @endif">
                                </div>
                                <div class="col">
                                    <label for="birth_date">{{ trans('sentences.birth_date') }}</label>
                                    <input type="text"
                                        class="form-control"
                                        id="datepicker"
                                        value="{{ auth()->user()->student->getBirthDateBr() ?? '' }}"
                                        name="birth_date"
                                        min="2021-09-01" max="2022-12-31">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
