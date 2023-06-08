<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Spatie\TranslationLoader\LanguageLine;
use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('index', [
            'featured_categories' => Category::with('products')->get()->map(function($category){
                return $category->setRelation('products', $category->products->take(4));
            }),
            'posts' => Post::isPublished()->take(2)->get()
        ]);
    }
}
