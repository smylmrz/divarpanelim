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

        $search = $request->search;
        $category = $request->category;
        $material = $request->material;
        $sort = $request->sort;

        $isCategoryArray = gettype($request->category) === 'array';
        $isMaterialArray = gettype($request->material) === 'array';

        $query->when($category, function ($q) use ($category, $isCategoryArray) {
            return $q->whereHas('category', function ($c) use ($category, $isCategoryArray) {
               return $isCategoryArray
                   ? $c->whereIn('slug', $category)
                   : $c->where('slug', $category);
            });
        });

        $query->when($material, function ($q) use ($material, $isMaterialArray) {
            return $q->whereHas('material', function ($c) use ($material, $isMaterialArray) {
                return $isMaterialArray
                    ? $c->whereIn('slug', $material)
                    : $c->where('slug', $material);
            });
        });

        $query->when($search, function ($q) use ($search) {;
            return $q->where('name', 'like', "%$$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('slug', 'like', "%$search%");
        });

        $query->when($sort === 'default', function($q) {
            return $q->orderBy('id');
        });

        $query->when($sort === 'price_desc', function($q) {
            return $q->orderBy('price', 'desc');
        });

        $query->when($sort === 'price_asc', function($q) {
            return $q->orderBy('price', 'asc');
        });

        $parent_category = null;
        $categoryFilters = [];

        if (isset($request->category)){

            if ($isCategoryArray) {
                $categoryFilters = array_merge($categoryFilters, $request->category);

                if (count($category) === 1){
                    $parent_category = Category::where('slug', $request->category)->with('children')->first();
                }
            } else {
                $categoryFilters[] = $request->category;
                $parent_category = Category::where('slug', $request->category)->with('children')->first();
            }
        }

        $materialFilters = [];

        if (isset($material)){
            if ($isMaterialArray) {
                $materialFilters = array_merge($materialFilters, $request->material);
            } else {
                $materialFilters[] = $request->material;
            }
        }

        return view('products.index', [
            'products' => $query->get(),
            'materials' => Material::all(),
            'search' => $request->search,
            'sort' => $request->sort,
            'filter_categories' => $categoryFilters,
            'filter_materials' => $materialFilters,
            'parent_category' => $parent_category
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
