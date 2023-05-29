<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'note' => $request->note,
            'product_id' => $product->id
        ]);

        Mail::to('smylmrz@gmail.com')->send(new OrderCreated($order));

        return redirect()->route('orders.create', $product->slug)->with('success', 'Order created successfully');
    }
}
