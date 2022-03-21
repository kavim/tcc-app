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

                            <span class="mr-2">Estou formado</span>
                            <label class="switch">
                                <input type="checkbox" class="success" id="switch" name="is_featured"
                                    @if(isset($faq))
                                        {{ old('is_featured') == 'on' || $faq->is_featured == 1 ? 'checked' : '' }}
                                    @else
                                        {{ old('is_featured') == 'on' ? 'checked' : '' }}
                                    @endif
                                >
                                <span class="slider round"></span>
                            </label>

                            <br>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="birth_date">{{ trans('sentences.course_started_at') }}</label>
                                    <input type="text"
                                        class="form-control"
                                        id="datepicker"
                                        value="{{ $course_started_at ?? '' }}"
                                        name="birth_date"
                                        min="2021-09-01" max="2022-12-31">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="birth_date">{{ trans('sentences.course_completed_at') }}</label>
                                    <input type="text"
                                        class="form-control"
                                        id="datepicker"
                                        value="{{ $course_completed_at ?? '' }}"
                                        name="birth_date"
                                        min="2021-09-01" max="2022-12-31">
                                </div>
                            </div>

                            <br>

                            <label for="exampleFormControlInput1" class="form-label"><small>{{trans('sentences.select_your_course')}}</small></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white"><i class="bi bi-funnel"></i></span>
                                <select class="form-select" name="selected_course_id" aria-label="Default select example">
                                    <option selected disabled {{!$current_course_id ? 'selected' : ''}} value="">Selecionar curso</option>
                                    @foreach ($courses as $course)
                                        <option {{$current_course_id == $course->id ? 'selected' : ''}} value="{{ $course->id }}">
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
