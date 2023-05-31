<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\FileManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductImageController extends Controller
{
    public function index(Product $product): View
    {
        $product->load('images');

        return view('dashboard.products.images', [
            'product' => $product
        ]);
    }

    public function store(Product $product, Request $request): RedirectResponse
    {
        foreach ($request->file('images') as $image) {
            $slug = $product->slug . '-' . Str::random(10);

            $imagePath = FileManager::upload($image, 'uploads/products/', $slug);

            $product->images()->create([
                'image' => $imagePath,
                'is_interior' => (bool)$request->interior
            ]);
        }

        return redirect()->route('dashboard.product-images.index', $product->id)->with('success', 'Şəkil yükləndi');
    }

    public function destroy(ProductImage $productImage): RedirectResponse
    {
        $productId = $productImage->product_id;
        $productImage->delete();

        return redirect()->route('dashboard.product-images.index', $productId)->with('success', 'Şəkil silindi');
    }
}
