<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Settings;
use App\Models\Social;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $links = [
            [
                "name" => trans("pages.about"),
                "route" => "about",
                "path" => "/about"
            ],
            [
                "name" => trans("pages.contact"),
                "route" => "contact",
                "path" => "/contact"
            ],
            [
                "name" => trans("pages.blog"),
                "route" => "posts.index",
                "path" => "/blog"
            ],
            [
                "name" => trans("pages.for_designers"),
                "route" => "home",
                "path" => "/projects"
            ],
        ];

        view()->share([
            'languages' => Language::all(),
            'categories' => Category::with('children')->get(),
            'socials' => Social::all(),
            'settings' => Settings::find(1),
        ]);
    }
}
