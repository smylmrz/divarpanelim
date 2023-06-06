<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('dashboard.login');
    }

    public function attempt(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('dashboard.login')->with('error', 'Invalid credentials');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();

        return redirect()->route('dashboard.login');
    }
}
