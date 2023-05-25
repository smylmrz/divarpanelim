<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\FileManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('dashboard.products.index', [
            'products' => Product::with('category')->get()
        ]);
    }

    public function create(): View
    {
        return view('dashboard.products.create');
    }

    public function store(Request $request)
    {
        $imagePath = FileManager::upload($request->file('image'), 'uploads/products/', $request->slug);

        Product::create([
            'name' => [
                'az' => $request->name_az,
                'en' => $request->name_en,
                'ru' => $request->name_ru,
            ],
            'description' => [
                'az' => $request->description_az,
                'en' => $request->description_en,
                'ru' => $request->description_ru,
            ],
            'slug' => $request->slug,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'price' => $request->price,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
        ]);

        return redirect()->route('dashboard.products.index')->with('success', 'Məhsul əlavə edildi');
    }

    public function edit(Product $product): View
    {
        $product->load('category');

        return view('dashboard.products.edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {

        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            $imagePath = FileManager::upload($request->file('image'), 'uploads/products/', $request->slug);
        }

        $product->update([
            'name' => [
                'az' => $request->name_az,
                'en' => $request->name_en,
                'ru' => $request->name_ru,
            ],
            'description' => [
                'az' => $request->description_az,
                'en' => $request->description_en,
                'ru' => $request->description_ru,
            ],
            'slug' => $request->slug,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'price' => $request->price,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
        ]);

        return redirect()->route('dashboard.products.edit', $product->id)->with('success', 'Məhsul yeniləndi');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.products.index')->with('success', 'Məhsul silindi');
    }
}
