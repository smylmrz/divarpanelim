<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SliderDetail;
use Illuminate\Http\Request;

class SliderDetailController extends Controller
{
    public function show()
    {
        $details = SliderDetail::find(1);

        return view('dashboard.sliders.details', [
            'details' => $details,
        ]);
    }

    public function update(Request $request)
    {
        SliderDetail::find(1)->update([
            'title' => [
                'az' => $request->title_az,
                'en' => $request->title_en,
                'ru' => $request->title_ru,
            ],
            'content' => [
                'az' => $request->content_az,
                'en' => $request->content_en,
                'ru' => $request->content_ru,
            ],
            'primary_action_text' => [
                'az' => $request->primary_action_text_az,
                'en' => $request->primary_action_text_en,
                'ru' => $request->primary_action_text_ru,
            ],
            'primary_action_url' => $request->primary_action_url,
            'secondary_action_text' => [
                'az' => $request->secondary_action_text_az,
                'en' => $request->secondary_action_text_en,
                'ru' => $request->secondary_action_text_ru,
            ],
            'secondary_action_url' => $request->secondary_action_url,
        ]);

        return redirect()->route('dashboard.slider-details.show')->with('success', 'Slayder detalları uğurla yeniləndi!');
    }
}
