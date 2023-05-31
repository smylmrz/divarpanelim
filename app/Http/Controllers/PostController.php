<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function show($slug): View
    {
        $post = Post::whereSlug($slug)->isPublished()->firstOrFail();

        $post->increment('views');
        $post->update();

        return view('posts.show', [
            'post' => $post
        ]);
    }
}
