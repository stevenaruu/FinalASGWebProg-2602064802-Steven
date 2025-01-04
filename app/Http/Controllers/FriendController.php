<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    //
    public function index()
    {
        $friends = Friend::where('friend.user_id', Auth::user()->id)
            ->join('user', 'friend.friend_id', 'user.id')
            ->with(['user.hobby'])
            ->where('status', 'Friend')
            ->select('friend.*', 'user.*', DB::raw('(SELECT COUNT(*) FROM chat WHERE recipient_id = ' . Auth::user()->id . ' AND isRead = false AND sender_id = friend.friend_id) AS unread'))
            ->get();

        $request_notif = Friend::where('user_id', Auth::user()->id)
            ->where('status', 'Friend Request')->count() ?? 0;

        return view('pages.friend', compact('friends', 'request_notif'));
    }

    public function friend_request()
    {
        $friends = Friend::where('friend.user_id', Auth::user()->id)
            ->join('user', 'friend.friend_id', 'user.id')
            ->with(['user.hobby'])
            ->where('status', 'Friend Request')
            ->get();

        $request_notif = Friend::where('user_id', Auth::user()->id)
            ->where('status', 'Friend Request')->count() ?? 0;

        return view('pages.friend-request', compact('friends', 'request_notif'));
    }

    public function sent_request()
    {
        $friends = Friend::where('friend.user_id', Auth::user()->id)
            ->join('user', 'friend.friend_id', 'user.id')
            ->with(['user.hobby'])
            ->where('status', 'Sent')
            ->get();

        $request_notif = Friend::where('user_id', Auth::user()->id)
            ->where('status', 'Friend Request')->count() ?? 0;

        return view('pages.sent-request', compact('friends', 'request_notif'));
    }

    public function add_remove_friend($id)
    {
        $user = Friend::where('user_id', Auth::user()->id)->where('friend_id', $id);
        $friend = Friend::where('user_id', $id)->where('friend_id', Auth::user()->id);

        if ($user->exists() && $friend->exists()) {
            $user->delete();
            $friend->delete();
        } else {
            Friend::create([
                'user_id' => Auth::user()->id,
                'friend_id' => $id,
                'status' => 'Sent'
            ]);

            Friend::create([
                'user_id' => $id,
                'friend_id' => Auth::user()->id,
                'status' => 'Friend Request'
            ]);
        }

        return redirect()->back();
    }

    public function approve_friend($id)
    {
        Friend::where('user_id', $id)->where('friend_id', Auth::user()->id)->update(['status' => 'Friend']);
        Friend::where('user_id', Auth::user()->id)->where('friend_id', $id)->update(['status' => 'Friend']);

        return redirect()->back();
    }
}
