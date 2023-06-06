<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::query();

        $query->when($request->category, function ($q) use ($request) {
            return $q->whereHas('category', function ($c) use ($request) {
               return gettype($request->category) === 'array'
                   ? $c->whereIn('slug', $request->category)
                   : $c->where('slug', $request->category);
            });
        });

        $query->when($request->material, function ($q) use ($request) {
            return $q->whereHas('material', function ($c) use ($request) {
                return gettype($request->material) === 'array'
                    ? $c->whereIn('slug', $request->material)
                    : $c->where('slug', $request->material);
            });
        });

        $query->when($request->search, function ($q) use ($request) {
            $search = $request->search;

            return $q->where('name', 'like', "%$$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('slug', 'like', "%$search%");
        });

        $query->when($request->sort === 'default', function($q) {
            return $q->orderBy('id');
        });

        $query->when($request->sort === 'price_desc', function($q) {
            return $q->orderBy('price', 'desc');
        });

        $query->when($request->sort === 'price_asc', function($q) {
            return $q->orderBy('price', 'asc');
        });

        $categoryFilters = [];

        if (isset($request->category)){

            if (gettype($request->category)  === 'array') {
                $categoryFilters = array_merge($categoryFilters, $request->category);
            }

            if (gettype($request->category)  === 'string') {
                $categoryFilters[] = $request->category;
            }
        }

        $materialFilters = [];

        if (isset($request->material)){

            if (gettype($request->material)  === 'array') {
                $materialFilters = array_merge($materialFilters, $request->material);
            }

            if (gettype($request->material)  === 'string') {
                $materialFilters[] = $request->material;
            }
        }

        return view('products.index', [
            'products' => $query->get(),
            'materials' => Material::all(),
            'search' => $request->search,
            'sort' => $request->sort,
            'filter_categories' => $categoryFilters,
            'filter_materials' => $materialFilters
        ]);
    }

    public function show($slug)
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
            'products' => Product::hasDesign()->get(),
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
