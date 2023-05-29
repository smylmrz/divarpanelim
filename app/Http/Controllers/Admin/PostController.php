<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\FileManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('dashboard.posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $imagePath = FileManager::upload($request->image, 'uploads/posts/', $request->slug);

        Post::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => $request->slug,
            'body' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard.posts.index')->with('success', 'Post yaradıldı');
    }

    public function edit(Post $post): View
    {
        return view('dashboard.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post, Request $request): RedirectResponse
    {
        $imagePath = $post->image;

        if ($request->hasFile('image')) {
            $imagePath = FileManager::upload($request->image, 'uploads/posts/', $request->slug);
        }

        $post->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => $request->slug,
            'body' => $request->content,
            'is_published' => (bool)$request->is_published,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard.posts.edit', $post->id)->with('success', 'Post yeniləndi');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('dashboard.posts.index')->with('success', 'Post silindi');
    }

}
