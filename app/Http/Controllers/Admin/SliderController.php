<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Services\FileManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SliderController extends Controller
{
    public function index(): View
    {
        return view('dashboard.sliders.index', [
            'sliders' => Slider::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $slug = $request->alt ? Str::slug($request->alt, '-') : 'slider-img-'. Str::random('10');

        $imagePath = FileManager::upload($request->image, 'uploads/sliders/', $slug);

        Slider::create([
            'image' => $imagePath,
            'alt' => [
                'az' => $request->alt_az,
                'en' => $request->alt_en,
                'ru' => $request->alt_ru,
            ],
        ]);

        return redirect()->route('dashboard.sliders.index')->with('success', 'Şəkil slayderə əlavə edildi');
    }

    public function edit(Slider $slider): View
    {
        return view('dashboard.sliders.edit', [
            'slider' => $slider,
        ]);
    }

    public function update(Slider $slider, Request $request): RedirectResponse
    {


        $imagePath = $slider->image;

        if ($request->image) {
            $slug = $request->alt ? Str::slug($request->alt, '-') : 'slider-img-'. Str::random('10');
            $imagePath = FileManager::upload($request->image, 'uploads/sliders/', $slug);
        }

        $slider->update([
            'image' => $imagePath,
            'alt' => [
                'az' => $request->alt_az,
                'en' => $request->alt_en,
                'ru' => $request->alt_ru,
            ],
        ]);

        return redirect()->route('dashboard.sliders.edit', $slider->id)->with('success', 'Slayder yeniləndi');
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        $slider->delete();

        return redirect()->route('dashboard.sliders.index')->with('success', 'Slayder silindi');
    }
}
