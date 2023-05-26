<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($category, $product)
    {
        return view('products.show', [
            'product' => Product::with('images')->where('slug', $product)->firstOrFail()
        ]);
    }
}
