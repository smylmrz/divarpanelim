<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Services\FileManager;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        $settings = Settings::find(1);

        $logo = $settings->logo;
        $footer_logo = $settings->footer_logo;

        if ($request->hasFile('logo')) {
            $logo = FileManager::upload($request->logo, 'uploads/', 'logo');
        }

        if ($request->hasFile('footer_logo')) {
            $footer_logo = FileManager::upload($request->footer_logo, 'uploads/', 'footer-logo');
        }

        $settings->update([
            'title' => [
                'az' => $request->title_az,
                'en' => $request->title_en,
                'ru' => $request->title_ru,
            ],
            'tagline' => [
                'az' => $request->tagline_az,
                'en' => $request->tagline_en,
                'ru' => $request->tagline_ru,
            ],
            'description' => [
                'az' => $request->description_az,
                'en' => $request->description_en,
                'ru' => $request->description_ru,
            ],
            'address' => [
                'az' => $request->address_az,
                'en' => $request->address_en,
                'ru' => $request->address_ru,
            ],
            'copyright' => [
                'az' => $request->copyright_az,
                'en' => $request->copyright_en,
                'ru' => $request->copyright_ru,
            ],
            'phone' => $request->phone,
            'keywords' => $request->keywords,
            'address_url' => $request->address_url,
            'logo' => $logo,
            'footer_logo' => $footer_logo
        ]);

        return redirect()->route('dashboard.settings.index')->with('success', 'Parametrlər yeniləndi');
    }
}
