@extends('contents.master')

<style>
    .custom-card {
        height: 80vh;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .custom-card-body {
        flex: 1;
        overflow-y: auto;
    }

    .custom-card-body::-webkit-scrollbar {
        width: 6px;
    }

    .custom-card-body::-webkit-scrollbar-thumb {
        background: #ffc107;
        border-radius: 3px;
    }

    .custom-card-body::-webkit-scrollbar-thumb:hover {
        background: #e0a800;
    }

    .custom-card-body::-webkit-scrollbar-track {
        background: #f8f9fa;
    }

    .custom-card-body {
        scrollbar-width: thin;
        scrollbar-color: #ffc107 #f8f9fa;
    }
</style>


@section('content')
    @include('components.send-avatar-navbar')
    <div class="container-fluid">
        <div style="height: 85vh;" class="card mt-4 shadow custom-card">
            <div class="card-header bg-warning py-3 m-0 d-flex gap-3 align-items-center">
                <div style="height: 35px; width: 35px" class="rounded-circle overflow-hidden">
                    <img class="w-100 h-100 object-fit-cover rounded-circle"
                        src="data:image/jpeg;base64,{{ base64_encode($recipient->image) }}" alt="profile-image">
                </div>
                <h5 class="fw-bold text-white">{{ trim(parse_url($recipient->username, PHP_URL_PATH), '/') }}</h5>
            </div>
            <div class="card-body alert alert-secondary m-0 custom-card-body">
                @if (session('success'))
                    <div class="alert alert-warning">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    @foreach ($avatars as $avatar)
                        <div class="col-md-3 mb-4">
                            <div class="card shadow">
                                <div class="d-flex justify-content-between card-header m-0 alert alert-warning text-center">
                                    <div class="fw-bold">
                                        {{ $avatar->title }}
                                    </div>
                                    <div>
                                        <span class="badge bg-warning text-white">
                                            {{ $avatar->coin }}
                                        </span>
                                        Coins
                                    </div>
                                </div>
                                <img src="data:image/jpeg;base64,{{ base64_encode($avatar->image) }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <form action="{{ route('send-avatar') }}" method="POST">
                                        @csrf
                                        <button class="shadow-sm px-5 btn btn-warning text-white fw-bold">Send
                                            Avatar</button>
                                        <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                                        <input type="hidden" name="recipient_id" value="{{ $recipient->id }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
