<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderDetail;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return response()->json([
            'details' => SliderDetail::find(1),
            'slides' => Slider::all(),
        ]);
    }
}
