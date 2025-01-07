<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Chat;
use App\Models\User;
use App\Models\UserAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($user_id, $friend_id)
    {
        $sender_chats = Chat::where('sender_id', $user_id)
            ->where('recipient_id', $friend_id)->get();

        $recipient_chats = Chat::where('sender_id', $friend_id)
            ->where('recipient_id', $user_id)->get();

        $is_read = Chat::where('sender_id', $friend_id)
            ->where('recipient_id', $user_id)
            ->where('isRead', false)
            ->update(['isRead' => true]);

        $chats = $sender_chats->merge($recipient_chats)->sortBy('created_at');
        $recipient = User::find($friend_id);

        return view('pages.chat', compact('chats', 'recipient'));
    }

    public function send_message(Request $request)
    {
        Chat::create([
            'sender_id' => request()->input('sender_id'),
            'recipient_id' => request()->input('recipient_id'),
            'message' => request()->input('message')
        ]);

        return redirect()->back();
    }

    public function send_avatar_view($friend_id)
    {
        $recipient = User::where('id', $friend_id)->first();
        $avatars = UserAvatar::where('user_id', Auth::id())
            ->join('avatar', 'user_avatar.avatar_id', 'avatar.id')
            ->where('status', 'Saved')
            ->get()
            ->map(function ($avatar) {
                $avatar->title = __('lang.' . Str::snake(strtolower($avatar->title)));
                return $avatar;
            });

        $pending_avatar_count = UserAvatar::where('user_id', Auth::id())
            ->join('avatar', 'user_avatar.avatar_id', 'avatar.id')
            ->where('status', 'Pending')
            ->count();

        return view('pages.send-avatar', compact('recipient', 'avatars', 'pending_avatar_count'));
    }
}
