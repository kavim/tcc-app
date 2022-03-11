@extends('layouts.app')
@section('content')
    <div>
        hello, {{ Auth::user()->name }}
    </div>
@endsection
