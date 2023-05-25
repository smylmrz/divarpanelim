<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LanguageController extends Controller
{
    public function index(): View
    {
        return view('dashboard.languages.index');
    }

    public function store(Request $request): RedirectResponse
    {
        Language::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return redirect()->route('dashboard.languages.index')->with('success', 'Dil əlavə edildi');
    }

    public function edit($id): View
    {
        return view('dashboard.languages.edit',
        [
            'l' => Language::find($id)
        ]);
    }

    public function update(Language $language, Request $request): RedirectResponse
    {
        $language->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return redirect()->route('dashboard.languages.edit', $language->id)->with('success', 'Dil yeniləndi');
    }

    public function destroy(Language $language): RedirectResponse
    {
        $language->delete();

        return redirect()->route('dashboard.languages.index')->with('success', 'Dil silindi');
    }
}
