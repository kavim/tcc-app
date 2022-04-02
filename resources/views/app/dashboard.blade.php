@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 mb-3">
                <h3>{{ trans('sentences.welcome_user') }}, {{ Auth::user()->name }}</h3>
            </div>

            <div class="col-12">
                <x-app.notify></x-app.notify>
            </div>
        </div>
    </div>
@endsection
