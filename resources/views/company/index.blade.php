@extends('layouts.company')

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3>{{ trans('sentences.welcome_user') }}, {{ Auth::user()->name }}</h3>
                    <p>Genreciando empresa:  {{ Auth::user()->company->name }}</p>

                    <div class="col-12">
                        @if (! auth()->user()->company->checkVerified())
                            <div class="card border-danger mb-3">
                            <div class="card-header text-white bg-danger"><strong>{{ __('messages.warning') }}</strong> </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ __('messages.campany_not_verified') }}</h5>
                                <p class="card-text">{{ __('messages.awaiting_admin_to_verify') }}</p>
                            </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
