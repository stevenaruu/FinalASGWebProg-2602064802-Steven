<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function show_payment_page()
    {
        $price = session('registration_price');
        if (!$price) {
            return redirect()->route('register')->with('error', 'Registration data not found.');
        }

        return view('pages.payment', compact('price'));
    }

    public function process_payment(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        $amountPaid = $request->input('amount');
        $price = session('registration_price');
        
        $underpaid = $price - $amountPaid;
        $overpaid = $amountPaid - $price;
        session(['overpaid_amount' => $overpaid]);

        if ($underpaid > 0) {
            return redirect()->route('payment-show')->with('warning', __('lang.underpaid') . ' ' . $underpaid . ' ' . __('lang.coin'));
        } elseif ($overpaid > 0) {
            return redirect()->route('payment-show')->with('confirm_overpaid', __('lang.overpaid') . ' ' . $overpaid . ' ' . __('lang.coin') . '. ' . __('lang.exceess'));
        }

        return $this->finalize_payment(0);
    }

    public function handle_overpaid(Request $request)
    {
        $action = $request->input('action');
        $overpaid = session('overpaid_amount');
        $price = session('registration_price');

        if ($action === 'yes') {
            return $this->finalize_payment($overpaid);
        } elseif ($action === 'no') {
            session()->forget(['overpaid_amount']);
            return view('pages.payment', compact('price'));
        }
    }

    private function finalize_payment($overpaid)
    {
        $user_data = session('user_data');
        $hobbies_data = session('hobbies_data');

        $user = User::create(array_merge($user_data, ['coin' => $overpaid, 'password' => bcrypt($user_data['password'])]));
        foreach ($hobbies_data as $hobby) {
            Hobby::create(['user_id' => $user->id, 'hobby' => $hobby]);
        }

        $credentials = [
            'mobile_number' => $user->mobile_number,
            'password' => $user_data['password'],
        ];

        session()->forget(['user_data', 'hobbies_data', 'registration_price', 'overpaid_amount']);
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors(['login' => __('lang.invalid_credentials')])->withInput();
    }
}
