<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function create($slug): View
    {
        $product = Product::where('slug', $slug)->with('category')->firstOrFail();

        return view('orders.create', [
            'product' => $product
        ]);
    }
}
