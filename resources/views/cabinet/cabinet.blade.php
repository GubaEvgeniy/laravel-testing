@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-benefits">
                    <div class="card-header">{{ __('Cabinet') }}</div>
                    @yield('cabinet')
                </div>
            </div>
        </div>
    </div>
@endsection
