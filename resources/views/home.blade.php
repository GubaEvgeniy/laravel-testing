@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Get your benefit') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        <p>Hello {{ Auth::user()->name }}</p>
                    @endauth

                    <form method="POST" action="{{ route('benefits.calculate') }}">
                        @csrf

                        <button type="submit" class="btn btn-primary">
                            {{ __('Get benefit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
