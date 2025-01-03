@extends('contents.master')

@section('content')
    @include('components.friend-navbar')
    <div class="container-fluid">
        @foreach ($friends as $friend)
            <div class="card mt-3">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        {{ $friend->username }}
                    </div>
                    <div class="d-flex gap-2">
                        @if (auth()->check())
                            <span
                                class="bg-warning text-white m-0 fw-bold justify-content-center rounded-pill d-flex align-items-center py-1 px-3">{{ $friend->status }}</span>
                        @endif
                        <div role="button" onclick="window.location='{{ route('add-remove-friend', $friend->friend_id) }}'"
                            style="height: 30px; width: 30px" class="overflow-hidden">
                            <img class="w-100 h-100 object-fit-cover" src="{{ asset('assets/images/friend.png') }}"
                                alt="add-friends">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <div onclick="window.location='{{ auth()->check() ? route('profile', $friend->id) : route('login') }}'"
                            role="button" style="height: 50px; width: 50px" class="rounded-circle overflow-hidden">
                            <img class="w-100 h-100 object-fit-cover rounded-circle"
                                src="data:image/jpeg;base64,{{ base64_encode($friend->image) }}" alt="profile-image">
                        </div>
                        <h5 onclick="window.location='{{ auth()->check() ? route('profile', $friend->id) : route('login') }}'"
                            role="button" class="card-title">{{ trim(parse_url($friend->username, PHP_URL_PATH), '/') }}
                        </h5>
                    </div>
                    <div class="card-text mt-3 d-flex flex-wrap gap-2">
                        @foreach ($friend->user->hobby as $hobby)
                            <span
                                class="me-2 rounded-pill px-3 py-1 fw-bold bg-warning text-white">{{ $hobby->hobby }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="position-relative">
                    <div class="position-absolute bottom-0 end-0 m-3 me-4">
                        <div class="position-relative" style="width: 50px; height: 50px;"
                            onclick="window.location='{{ route('chat', ['user_id' => Auth::user()->id, 'friend_id' => $friend->id]) }}'"
                            role="button">
                            <img src="{{ asset('assets/images/chat.png') }}" alt="Chat Icon"
                                class="w-100 h-100 object-fit-cover">
                            @if ($friend->unread > 0)
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-white">
                                    {{ $friend->unread }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- <div onclick="window.location='{{ route('chat', ['user_id' => Auth::user()->id, 'friend_id' => $friend->id]) }}'"
                        role="button" style="width: 50px; height: 50px;"
                        class="overflow-hidden position-absolute bottom-0 end-0 m-3">
                        <img class="w-100 h-100 object-fit-cover" src="{{ asset('assets/images/chat.png') }}"
                            alt="">
                    </div> --}}
                </div>
            </div>
        @endforeach
    </div>
@endsection
