<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Friend;
use App\Models\Gender;
use App\Models\Hobby;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with(['hobby', 'gender']);

        if (Auth::check()) {
            $query = User::with(['hobby', 'gender', 'friendStatus']);
            $query->where('id', '!=', Auth::id())
                ->whereNotIn('id', function ($query) {
                    $query->select('friend_id')
                        ->from('friend')
                        ->where('user_id', Auth::id())
                        ->where('status', 'Friend');
                });
        }

        if ($request->has('gender') && $request->query('gender')) {
            $query->where('gender_id', $request->query('gender'));
        }

        if ($request->has('hobby') && $request->query('hobby')) {
            $query->whereHas('hobby', function ($q) use ($request) {
                $q->where('hobby', 'LIKE', '%' . $request->query('hobby') . '%');
            });
        }

        $users = $query->get()->map(function ($user) {
            if (isset($user->friendStatus)) {
                $user->friendStatus->status = __('lang.' . strtolower(str_replace(' ', '_', $user->friendStatus->status)));
            }
            return $user;
        });

        $chat_notif = Auth::check() ? Chat::where('recipient_id', Auth::id())->where('isRead', false)->count() : 0;
        $request_notif = Auth::check() ? Friend::where('user_id', Auth::id())->where('status', 'Friend Request')->count() : 0;

        return view('pages.home', compact('users', 'chat_notif', 'request_notif'));
    }

    public function register()
    {
        $genders = Gender::all();
        return view('pages.register', compact('genders'));
    }

    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gender' => 'required|exists:gender,id',
            'hobbies' => 'required|array|min:3',
            'hobbies.*' => 'required|string|max:255',
            'username' => 'required|url|regex:/^http:\/\/www\.instagram\.com\/[a-zA-Z0-9._]+$/',
            'mobile_number' => 'required|digits_between:10,15',
            'password' => 'required|min:8|confirmed',
        ], [
            'gender.required' => __('lang.select_gender'),
            'gender.exists' => __('lang.invalid_gender'),
            'hobbies.required' => __('lang.required_hobbies'),
            'hobbies.min' => __('lang.min_hobbies'),
            'username.regex' => __('lang.username_format'),
            'mobile_number.digits_between' => __('lang.mobile_number_format'),
            'password.min' => __('lang.password_min'),
            'password.confirmed' => __('lang.password_confirmation'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $registration_price = random_int(100000, 125000);

        $user_data = [
            'username' => $request->username,
            'gender_id' => $request->gender,
            'mobile_number' => $request->mobile_number,
            'coin' => 0,
            'password' => $request->password,
            'image' => file_get_contents(public_path('assets/images/default.jpg')),
        ];

        $hobbies_data = $request->hobbies;

        session([
            'user_data' => $user_data,
            'hobbies_data' => $hobbies_data,
            'registration_price' => $registration_price,
        ]);

        return redirect()->route('payment-show');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function do_login(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('mobile_number', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors(['login' => __('lang.invalid_credentials')])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        $chat_notif = Auth::check() ? Chat::where('recipient_id', Auth::id())->where('isRead', false)->count() : 0;
        $request_notif = Auth::check() ? Friend::where('user_id', Auth::id())->where('status', 'Friend Request')->count() : 0;

        return view('pages.profile', compact('user', 'chat_notif', 'request_notif'));
    }
}
