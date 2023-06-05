<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('dashboard.users.index', [
            'users' => User::where('is_admin', 0)->get()
        ]);
    }

    public function show(User $user): View
    {
        return view('dashboard.users.show', [
            'user' => $user
        ]);
    }

    public function verify(User $user): RedirectResponse
    {
        $user->update([
            'is_verified' => true
        ]);

        return redirect()->route('dashboard.users.show', $user->id)->with('success', 'İstifadəçi təsdiqləndi');
    }
}
