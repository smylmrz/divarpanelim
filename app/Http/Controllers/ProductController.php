<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function category($category, Request $request): View
    {
        $category = Category::where('slug', $category)->firstOrFail();

        $query = Product::query()->where('category_id', $category->id);

        if ($request->has('materials')) {
            $query->whereHas('material', function($q) use ($request){
                return $q->whereIn('slug', $request->materials);
            });
        }

        if ($request->has('sort')) {
            $query->when($request->sort === 'default', function($q) {
                return $q->orderBy('id');
            });

            $query->when($request->sort === 'price_desc', function($q) {
               return $q->orderBy('price', 'desc');
            });

            $query->when($request->sort === 'price_asc', function($q) {
                return $q->orderBy('price', 'asc');
            });
        }

        return view('products.category', [
            'category' => $category,
            'materials' => Material::all(),
            'products' => $query->get(),
            'filters' => $request->materials,
            'sort' => $request->sort
        ]);
    }

    public function index(Request $request)
    {
        return view('products.index', [
            'products' => Product::where('name', 'like', "%$request->search%")
                ->orWhere('description', 'like', "%$request->search%")
                ->orWhere('slug', 'like', "%$request->search%")
                ->with('material')
                ->get(),
            'materials' => Material::all()
        ]);
    }

    public function show($category, $slug)
    {
        $product = Product::with(['images', 'material'])->where('slug', $slug)->firstOrFail();

        return view('products.show', [
            'product' => $product,
            'interiors' => $product->images()->where('is_interior', 1)->get(),
            'images' => $product->images()->where('is_interior', 0)->select('image')->get()->push((object) ['image' => $product->image]),
            'products' => Product::where('category_id', $product->category_id)->whereNot('id', $product->id)->take(4)->get()
        ]);
    }

    public function designs(): View
    {
        return view('designs.index', [
            'products' => Product::all(),
        ]);
    }

    public function design($slug): View
    {
        $product = Product::with(['images', 'material'])->where('slug', $slug)->firstOrFail();

        return view('designs.show', [
            'product' => $product,
            'interiors' => $product->images()->where('is_interior', 1)->get(),
            'images' => $product->images()->where('is_interior', 0)->select('image')->get()->push((object) ['image' => $product->image]),
        ]);
    }
}
