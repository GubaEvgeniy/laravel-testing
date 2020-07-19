@extends('benefits.benefits')

@section('benefit')
    <div class="card-body">
        <p>{{ __('You win :benefit real money', ['benefit' => $benefit->{'result'}]) }}</p>
    </div>
@endsection
