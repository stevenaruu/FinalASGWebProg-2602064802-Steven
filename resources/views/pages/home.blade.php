@extends('contents.master')

@section('content')
    @include('components.navbar')
    @if (auth()->check())
        <div class="alert alert-warning" role="alert">
            Welcome back <span class="fw-bold">{{ trim(parse_url(auth()->user()->username, PHP_URL_PATH), '/') }}!</span>
        </div>
    @endif
    <div class="container-fluid">
        @foreach ($users as $user)
            <div class="card mt-3">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        {{ $user->username }}
                    </div>
                    <div class="d-flex gap-2">
                        <div style="height: 30px; width: 30px" class="overflow-hidden">
                            @if (auth()->check())
                                <span
                                    class="bg-warning fw-bold justify-content-center text-white rounded-pill d-flex align-items-center py-1 px-3">pending</span>
                            @else
                                <img class="w-100 h-100 object-fit-cover" src="{{ asset('assets/images/like.png') }}"
                                    alt="add-friends">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <div onclick="window.location='{{ auth()->check() ? route('profile', $user->id) : route('login') }}'" role="button" style="height: 50px; width: 50px" class="rounded-circle overflow-hidden">
                            <img class="w-100 h-100 object-fit-cover rounded-circle"
                                src="data:image/jpeg;base64,{{ base64_encode($user->image) }}" alt="profile-image">
                        </div>
                        <h5 onclick="window.location='{{ auth()->check() ? route('profile', $user->id) : route('login') }}'" role="button" class="card-title">{{ trim(parse_url($user->username, PHP_URL_PATH), '/') }}</h5>
                    </div>
                    <div class="card-text mt-3 d-flex flex-wrap gap-2">
                        @foreach ($user->hobby as $hobby)
                            <span
                                class="me-2 rounded-pill px-3 py-1 fw-bold bg-warning text-white">{{ $hobby->hobby }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
