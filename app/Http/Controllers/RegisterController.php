<?php

namespace App\Http\Controllers;

use App\Mail\UserCreated;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register');
    }

    public function handle(Request $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ]);

        Mail::to('fard@divarpanelim.az')->send(new UserCreated($user));

        return redirect()->route('register.success', [
            'user' => $user
        ]);
    }

    public function success(User $user = null): View | RedirectResponse
    {
        if ($user) {
            return view('auth.register-success');
        }

        return redirect()->route('home');
    }
}
