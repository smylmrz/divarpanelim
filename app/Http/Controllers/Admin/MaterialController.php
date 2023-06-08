<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaterialController extends Controller
{
    public function index(): View
    {
        return view('dashboard.materials.index', [
            'materials' => Material::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Material::create([
            'name' => [
                'az' => $request->name_az,
                'en' => $request->name_en,
                'ru' => $request->name_ru,
            ],
            'slug' => $request->slug
        ]);

        return redirect()->route('dashboard.materials.index')->with('success', 'Material əlavə edildi');
    }

    public function edit(Material $material): View
    {
        return view('dashboard.materials.edit', [
            'material' => $material
        ]);
    }

    public function update(Material $material, Request $request): RedirectResponse
    {
        $material->update([
            'name' => [
                'az' => $request->name_az,
                'en' => $request->name_en,
                'ru' => $request->name_ru,
            ],
            'slug' => $request->slug
        ]);

        return redirect()->route('dashboard.materials.index')->with('success', 'Material yeniləndi');
    }

    public function destroy(Material $material): RedirectResponse
    {
        $material->delete();

        return redirect()->route('dashboard.materials.index')->with('success', 'Material silindi');
    }
}
