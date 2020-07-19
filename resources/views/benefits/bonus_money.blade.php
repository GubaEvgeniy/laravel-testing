@extends('benefits.benefits')

@section('benefit')
    <div class="card-body">
        <p>{{ __('You win :benefit bonus points', ['benefit' => $benefit]) }}</p>


    </div>
@endsection
