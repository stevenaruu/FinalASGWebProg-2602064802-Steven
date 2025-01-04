@extends('contents.master')

@section('content')
    <div class="container mt-5">
        <div class="alert alert-warning mb-4">
            <h2>Complete Your Registration</h2>
        </div>

        @if (session('warning'))
            <div class="alert alert-danger">
                {{ session('warning') }}
            </div>
        @endif

        @if (session('confirm_overpaid'))
            <div class="alert alert-warning">
                {{ session('confirm_overpaid') }}
                <form method="POST" action="{{ route('payment-overpaid') }}" class="mt-3">
                    @csrf
                    <button type="submit" name="action" value="no" class="btn btn-danger text-white">No</button>
                    <button type="submit" name="action" value="yes" class="btn btn-warning text-white">Yes</button>
                </form>
            </div>
        @endif

        <form method="POST" action="{{ route('payment-process') }}">
            @csrf
            <div class="mb-3">
                <label for="amount" class="form-label">Registration Price: {{ $price }} Coins</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount to pay"
                    required>
            </div>
            <button type="submit" class="btn btn-warning text-white px-5 fw-bold">Pay</button>
        </form>
    </div>
@endsection
