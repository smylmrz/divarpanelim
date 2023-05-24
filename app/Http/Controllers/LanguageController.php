<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LanguageController extends Controller
{
    public function index(): View
    {
        return view('dashboard.languages.index', [
            'languages' => Language::all()
        ]);
    }

    public function store(Request $request)
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

    public function update(Language $language, Request $request)
    {
        $language->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return back()->with('success', 'Dil yeniləndi');
    }

    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('dashboard.languages.index')->with('success', 'Dil silindi');
    }
}
