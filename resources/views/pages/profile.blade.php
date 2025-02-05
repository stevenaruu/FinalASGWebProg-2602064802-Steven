@extends('contents.master')

@section('content')
    @include('components.navbar')
    <div style="height: 90vh" class="container-fluid d-flex justify-content-center align-items-center">
        <div class="shadow card mt-3 w-75">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    {{ $user->username }}
                </div>
                <div class="d-flex gap-2">
                    @if (auth()->check() && $user->friendStatus)
                        <span
                            class="alert m-0 alert-secondary fw-bold justify-content-center text-secondary rounded-pill d-flex align-items-center py-1 px-3">{{ $user->friendStatus->status }}</span>
                    @endif
                    <div role="button"
                        onclick="window.location='{{ auth()->check() ? route('add-remove-friend', $user->id) : route('login') }}'"
                        style="height: 30px; width: 30px" class="overflow-hidden">
                        @if (auth()->check())
                            <img class="w-100 h-100 object-fit-cover"
                                src="{{ $user->friendStatus && $user->friendStatus->status === 'Sent' ? asset('assets/images/friend.png') : asset('assets/images/like.png') }}"
                                alt="add-friends">
                        @else
                            <img class="w-100 h-100 object-fit-cover" src="{{ asset('assets/images/like.png') }}"
                                alt="add-friends">
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center gap-3">
                    <div onclick="window.location='{{ auth()->check() ? route('profile', $user->id) : route('login') }}'"
                        role="button" style="height: 50px; width: 50px" class="rounded-circle overflow-hidden">
                        <img class="w-100 h-100 object-fit-cover rounded-circle"
                            src="data:image/jpeg;base64,{{ base64_encode($user->image) }}" alt="profile-image">
                    </div>
                    <h5 onclick="window.location='{{ auth()->check() ? route('profile', $user->id) : route('login') }}'"
                        role="button" class="card-title">{{ trim(parse_url($user->username, PHP_URL_PATH), '/') }}</h5>
                </div>
                <div class="card-text mt-3 d-flex flex-wrap gap-2">
                    @foreach ($user->hobby as $hobby)
                        <span class="me-2 rounded-pill px-3 py-1 fw-bold bg-warning text-white">{{ $hobby->hobby }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('components.chat-button')
@endsection
