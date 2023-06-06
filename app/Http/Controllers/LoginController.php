<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function attempt(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->back();
    }
}
