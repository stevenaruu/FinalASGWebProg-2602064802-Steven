<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Chat;
use App\Models\Friend;
use App\Models\User;
use App\Models\UserAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    //
    public function index()
    {
        $user_avatar_id = UserAvatar::where('user_id', Auth::id())->where('status', 'Saved')->get()->pluck('avatar_id');
        $avatars = Avatar::whereNotIn('id', $user_avatar_id)->get();
        $owned_avatars = Avatar::whereIn('id', $user_avatar_id)->get();

        $user = User::where('user.id', Auth::id())
            ->join('gender', 'user.gender_id', 'gender.id')
            ->first();

        return view('pages.avatar', compact('avatars', 'owned_avatars', 'user'));
    }

    public function my_avatar()
    {
        $avatars = UserAvatar::where('user_id', Auth::id())
            ->join('avatar', 'user_avatar.avatar_id', 'avatar.id')
            ->where('status', 'Saved')
            ->get();

        return view('pages.my-avatar', compact('avatars'));
    }

    public function buy_avatar(Request $request)
    {
        $avatar_id = $request->avatar_id;
        $coin = $request->coins;

        $user = User::where('id', Auth::id())->first();

        $user->coin -= $coin;

        if ($user->coin < 0) {
            return redirect()->back()->with('error', 'You do not have enough coins to buy this avatar.');
        }

        UserAvatar::create([
            'user_id' => Auth::id(),
            'avatar_id' => $avatar_id,
            'status' => 'Saved'
        ]);

        $user->save();

        return redirect()->back()->with('success', 'Successfully bought avatar.');
    }

    public function change_profile(Request $request)
    {
        $avatar_id = $request->avatar_id;

        $avatar = UserAvatar::where('user_id', Auth::id())
            ->where('avatar_id', $avatar_id)
            ->first();

        $current_profile = UserAvatar::where('user_id', Auth::id())
            ->where('isActive', true)
            ->first();

        if ($current_profile) {
            $current_profile->isActive = false;
            $current_profile->save();
        }

        $avatar->isActive = true;
        $avatar->save();

        $user = User::where('id', Auth::id())->first();

        $user->image = Avatar::where('id', $avatar_id)->first()->image;
        $user->save();

        return redirect()->back()->with('success', 'Successfully changed profile.');
    }

    public function remove_profile(Request $request)
    {
        $avatar_id = $request->avatar_id;

        $avatar = UserAvatar::where('user_id', Auth::id())
            ->where('avatar_id', $avatar_id)
            ->where('isActive', true)
            ->first();

        $avatar->isActive = false;
        $avatar->save();

        $user = User::where('id', Auth::id())->first();
        $user->image = file_get_contents(public_path('assets/images/default.jpg'));

        $user->save();

        return redirect()->back()->with('success', 'Successfully removed profile.');
    }

    public function show_off()
    {
        return view('pages.show-off');
    }
}
