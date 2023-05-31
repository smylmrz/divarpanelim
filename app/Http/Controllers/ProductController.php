<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($category, $slug)
    {
        $product = Product::with('images')->where('slug', $slug)->firstOrFail();

        return view('products.show', [
            'product' => $product,
            'interiors' => $product->images()->where('is_interior', 1)->get(),
            'images' => $product->images()->where('is_interior', 0)->select('image')->get()->push((object) ['image' => $product->image]),
            'products' => Product::where('category_id', $product->category_id)->whereNot('id', $product->id)->take(4)->get()
        ]);
    }
}
