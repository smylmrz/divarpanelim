<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('dashboard.orders.index', [
            'orders' => Order::all()
        ]);
    }

    public function show(Order $order): view
    {
        $order->load('product');

        $product = $order->product;

        $product->load('category');

        return view('dashboard.orders.show', [
            'order' => $order,
            'product' => $product
        ]);
    }
}
