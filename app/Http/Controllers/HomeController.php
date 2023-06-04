<?php

namespace App\Http\Controllers;

use Spatie\TranslationLoader\LanguageLine;
use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('index', [
            'posts' => Post::isPublished()->take(2)->get()
        ]);
    }
}
