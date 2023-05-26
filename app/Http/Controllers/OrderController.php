<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
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

    public function store(Product $product, Request $request): RedirectResponse
    {
        $product->orders()->create([
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'note' => $request->note
        ]);

        return redirect()->route('orders.create', $product->slug)->with('success', 'Order created successfully');
    }
}
