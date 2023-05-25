<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Language;
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

        view()->share([
            'languages' => Language::all(),
            'categories' => Category::all()
        ]);
    }
}
