<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\TranslationLoader\LanguageLine;

class TranslationController extends Controller
{
    public function index(): View
    {
        return view('dashboard.translations.index', [
            'translations' => LanguageLine::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        LanguageLine::create([
            'group' => 'global',
            'key' => $request->key,
            'text' => [
                'az' => $request->text_az,
                'en' => $request->text_en,
                'ru' => $request->text_ru,
            ]
        ]);

        return redirect()->route('dashboard.translations.index')->with('success', 'Tərcümə əlavə edildi');
    }

    public function edit($id): View
    {
        return view('dashboard.translations.edit', [
            'translation' => LanguageLine::find($id)
        ]);
    }

    public function update($id, Request $request): RedirectResponse
    {
        $translation = LanguageLine::findOrFail($id);

        $translation->update([
            'text' => [
                'az' => $request->text_az,
                'en' => $request->text_en,
                'ru' => $request->text_ru,
            ]
        ]);

        return redirect()->route('dashboard.translations.edit', $translation->id)->with('success', 'Tərcümə əlavə edildi');
    }
}
