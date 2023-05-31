<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SocialController extends Controller
{

    public function update(Request $request): RedirectResponse
    {
        $socials = Social::all();

        foreach ($socials as $social)
        {
            $social->update([
                'url' => $request->{$social->name}
            ]);
        }

        return redirect()->route('dashboard.socials.index')->with('success', 'Sosial linklər yeniləndi');
    }
}
