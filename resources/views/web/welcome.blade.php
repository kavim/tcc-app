@extends('layouts.web')
@section('content')

<x-app.header></x-app.header>

<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <img src="{{ asset('images/Resume-rafiki.svg') }}" alt="" width="img-fluid">
            </div>
            <div class="col-12 col-md-5 d-flex align-items-center">
                <div class="text-left">
                    <h2 class="section-heading text-uppercase">{{ __('sentences.about_us') }}</h2>
                    <h3 class="section-subheading text-muted">
                        {{ trans('sentences.home_header_text') }}
                        <br>
                        {{ trans('sentences.home_project_description') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ trans('sentences.home_project_objective_title') }}</h2>
            <h3 class="section-subheading text-muted">{{ trans('sentences.home_project_objective_description') }}</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <img src="{{ asset('images/Meeting-amico.svg') }}" alt="" class="w-50">
                <h4 class="my-3">{{ trans('sentences.staudants_page') }}</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/Meeting-pana.svg') }}" alt="" class="w-50">
                <h4 class="my-3">{{ trans('sentences.for_companies') }}</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/Webinar-amico.svg') }}" alt="" class="w-50">
                <h4 class="my-3">{{ trans('sentences.for_education_institutions') }}</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
        </div>
    </div>
</section>
@endsection
