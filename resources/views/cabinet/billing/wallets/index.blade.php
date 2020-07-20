@extends('cabinet.cabinet')

@section('cabinet')
    <div class="card-body">
        <table class="table">

            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type</th>
                <th scope="col">Balance</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($wallets as $wallet)
            <tr>
                <th scope="row">{{ $wallet->{'id'} }}</th>
                <td>{{ ucfirst(str_replace('_', ' ', $wallet->{'type'})) }}</td>
                <td>{{ $wallet->{'amount'} }}</td>
                <td>
                    <p>{{ __('billing.wallets.actions.'.$wallet->{'type'}.'.desc') }}</p>
                    <form method="POST" action="{{ route('cabinet.billing.wallets.action') }}" >
                        @csrf
                        <input type="text" name="amount" required>
                        <input type="hidden" name="wallet_type" value="{{ $wallet->{'type'} }}">
                        <input type="hidden" name="wallet_action" value="{{ $wallet->{'action'} }}">

                        <button type="submit" class="btn btn-info">
                            {{ __('billing.wallets.actions.'.$wallet->{'type'}.'.button') }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
