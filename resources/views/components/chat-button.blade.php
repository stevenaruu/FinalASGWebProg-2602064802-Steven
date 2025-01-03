<div class="position-fixed bottom-0 end-0 m-3">
    <div class="position-relative" style="width: 50px; height: 50px;" onclick="window.location='{{ route('friend') }}'"
        role="button">
        <img src="{{ asset('assets/images/chat.png') }}" alt="Chat Icon" class="w-100 h-100 object-fit-cover">
        @if ($chat_notif > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-white">
                {{ $chat_notif }}
            </span>
        @endif
    </div>
</div>
