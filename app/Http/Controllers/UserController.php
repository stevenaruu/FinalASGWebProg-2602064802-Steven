<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('pages.home');
    }

    public function register() {
        return view('pages.register');
    }
}
