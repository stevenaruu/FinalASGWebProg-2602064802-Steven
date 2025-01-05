@extends('contents.master')

@section('content')
    @include('components.settings-navbar')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="shadow card border-warning w-50 mx-auto mt-5">
        <div class="fw-bold card-header bg-warning text-white text-center">Top Up Coins</div>
        <div class="card-body">
            <form method="POST" action="{{ route('do-top-up') }}">
                @csrf
                <div class="alert alert-warning">
                    Please note that each press of the <span class="fw-bold">"Add Coins"</span> button will add 100 coins to your balance. Use this
                    feature responsibly to avoid exceeding any limits or restrictions set within the application. Thank you!
                </div>
                <div class="mb-3 d-flex justify-content-center gap-2">
                    Your Current Coins: <span class="badge bg-warning text-white me-2">{{ $user->coin }}</span>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="fw-bold text-white btn btn-warning">Add Coins</button>
                </div>
            </form>
        </div>
    </div>
@endsection
