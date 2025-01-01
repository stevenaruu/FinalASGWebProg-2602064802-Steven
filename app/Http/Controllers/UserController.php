<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Hobby;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.home');
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
            'gender.required' => 'Please select your gender.',
            'gender.exists' => 'The selected gender is invalid.',
            'hobbies.required' => 'You must add at least 3 hobbies.',
            'hobbies.min' => 'You must provide at least 3 hobbies.',
            'username.regex' => 'Your Instagram username must be a valid link starting with "http://www.instagram.com/".',
            'mobile_number.digits_between' => 'The mobile number must be between 10 and 15 digits.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $registrationPrice = random_int(100000, 125000);

        $user = User::create([
            'username' => $request->username,
            'gender_id' => $request->gender,
            'mobile_number' => $request->mobile_number,
            'coin' => 0,
            'password' => bcrypt($request->password),
            'image' => file_get_contents(public_path('assets/images/default.jpg')),
        ]);

        foreach ($request->hobbies as $hobby) {
            Hobby::create([
                'user_id' => $user->id,
                'hobby' => $hobby,
            ]);
        }

        return redirect()->back()->with('registrationPrice', $registrationPrice);
    }
}
