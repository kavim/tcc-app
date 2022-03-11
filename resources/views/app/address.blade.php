@extends('layouts.web')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ trans('sentences.address') }}</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('app.address.update') }}">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputCity">{{ trans('sentences.city') }}</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">{{ trans('sentences.state') }}</label>
                                    <select id="inputState" class="form-control">
                                        <option selected> {{ trans('sentences.select_a_country_first') }} </option>
                                        <option>Rivera</option>
                                        <option>Rs</option>
                                    </select>
                                </div><div class="form-group col-md-6">
                                    <label for="inputState">{{ trans('sentences.country') }}</label>
                                    <select id="inputState" class="form-control">
                                        <option selected> {{ trans('sentences.select_a_country') }} </option>
                                        <option>Uruguay</option>
                                        <option>Brasil</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
