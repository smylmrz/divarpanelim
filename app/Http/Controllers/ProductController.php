<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($category, $product)
    {
        $product = Product::with('images')->where('slug', $product)->firstOrFail();

        return view('products.show', [
            'product' => $product,
            'products' => Product::where('category_id', $product->category_id)->whereNot('id', $product->id)->take(4)->get()
        ]);
    }
}
