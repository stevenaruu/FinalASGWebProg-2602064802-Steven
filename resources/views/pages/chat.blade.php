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
    @include('components.chat-navbar')
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
                @foreach ($chats as $chat)
                    @if ($chat->sender_id == auth()->user()->id)
                        <div class="d-flex mb-3 justify-content-end">
                            <span class="alert alert-warning m-0 rounded-pill px-3 py-2">
                                {{ $chat->message }}</span>
                        </div>
                    @else
                        <div class="d-flex mb-3 justify-content-start">
                            <span class="bg-white rounded-pill px-3 py-2">
                                {{ $chat->message }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="card-footer alert alert-warning m-0">
                <form method="POST" class="d-flex gap-3" action="{{ route('send-message') }}">
                    @csrf
                    <input placeholder="Type a message" class="px-2 w-100" type="text" name="message" id="message">
                    <input type="hidden" name="recipient_id" value="{{ $recipient->id }}" id="recipient_id">
                    <input type="hidden" name="sender_id" value="{{ auth()->user()->id }}" id="sender_id">
                    <button type="submit" class="btn btn-warning">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
