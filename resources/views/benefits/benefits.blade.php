@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-benefits">
                    <div class="card-header">{{ __('Сongratulations!') }}</div>

                    @yield('benefit')

                    <div class="card-footer">
                        <form method="POST" action="{{ route('benefits.accept') }}">
                            @csrf
                            <input type="hidden" name="benefit_id" value="{{ $benefit->{'id'} }}">

                            <button type="submit" class="btn btn-success">
                                {{ __('Accept a gift') }}
                            </button>
                        </form>

                        <form method="POST" action="{{ route('benefits.refuse') }}">
                            @csrf
                            <input type="hidden" name="benefit_id" value="{{ $benefit->{'id'} }}">

                            <button type="submit" class="btn btn-danger">
                                {{ __('Refuse a gift') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
