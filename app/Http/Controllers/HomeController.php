<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
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
