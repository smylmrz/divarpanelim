<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\FileManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with('parent')->get();

        return view('dashboard.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $filePath = null;

        if ($request->hasFile('image')) {
            $filePath = FileManager::upload($request->image, 'uploads/categories/', $request->slug);
        }

        Category::create([
            'name' => [
                'az' => $request->name_az,
                'en' => $request->name_en,
                'ru' => $request->name_ru,
            ],
            'description' => [
                'az' => $request->content_az,
                'en' => $request->content_en,
                'ru' => $request->content_ru,
            ],
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
            'image' => $filePath,
        ]);

        return redirect()->route('dashboard.categories.index')->with('success', 'Kateqoriya əlavə edildi');
    }

    public function edit(Category $category): View
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
            'categories' => Category::with('parent')->get(),
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $filePath = $category->image;

        if ($request->hasFile('image')) {
            $filePath = FileManager::upload($request->image, 'uploads/categories/', $request->slug);
        }

        $category->update([
            'name' => [
                'az' => $request->name_az,
                'en' => $request->name_en,
                'ru' => $request->name_ru,
            ],
            'description' => [
                'az' => $request->content_az,
                'en' => $request->content_en,
                'ru' => $request->content_ru,
            ],
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
            'image' => $filePath,
        ]);

        return redirect()->route('dashboard.categories.index')->with('success', 'Kateqoriya yeniləndi');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('dashboard.categories.index')->with('success', 'Kateqoriya silindi');
    }
}
