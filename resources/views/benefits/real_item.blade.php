@extends('benefits.benefits')

@section('benefit')
    <div class="card-body">
        <p>{{ __('You win a :benefit item', ['benefit' => $benefit->{'result'}]) }}</p>
    </div>
@endsection
