<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'login', 'middleware' => 'guest'], function (){
    Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('/', [\App\Http\Controllers\LoginController::class, 'attempt'])->name('login.attempt');
});

Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['prefix' => 'register', 'middleware' => 'guest'], function (){
    Route::get('/', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
    Route::post('/', [\App\Http\Controllers\RegisterController::class, 'handle'])->name('register.handle');
    Route::get('/success/{user}', [\App\Http\Controllers\RegisterController::class, 'success'])->name('register.success');
});

Route::view('/register', 'auth.register')->name('register');

Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');

Route::get('/locale/{locale}', function($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::group(['prefix' => 'designs', 'as' => 'designs.', 'middleware' => 'auth'], function() {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'designs'])->name('index');
    Route::get('/{slug}', [\App\Http\Controllers\ProductController::class, 'design'])->name('show');
});

Route::group(['prefix' => 'blog'], function(){
    Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
});

Route::get('orders/create/{product}', [\App\Http\Controllers\OrderController::class, 'create'])->name('orders.create');

Route::post('orders/store/{product}', [\App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function(){

    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'index'])
        ->middleware('guest')->name('login');

    Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'attempt'])->name('login.attempt');

    Route::group(['middleware' => 'admin'], function() {
        Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');

        Route::resource('languages', \App\Http\Controllers\Admin\LanguageController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
        Route::get('product-images/{product}', [\App\Http\Controllers\Admin\ProductImageController::class, 'index'])->name('product-images.index');
        Route::post('product-images/{product}', [\App\Http\Controllers\Admin\ProductImageController::class, 'store'])->name('product-images.store');
        Route::delete('product-images/{productImage}', [\App\Http\Controllers\Admin\ProductImageController::class, 'destroy'])->name('product-images.destroy');
        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->only(['index', 'show']);
        Route::get('slider-details', [\App\Http\Controllers\Admin\SliderDetailController::class, 'show'])->name('slider-details.show');
        Route::put('slider-details', [\App\Http\Controllers\Admin\SliderDetailController::class, 'update'])->name('slider-details.update');
        Route::view('socials', 'dashboard.socials.index')->name('socials.index');
        Route::post('socials', [\App\Http\Controllers\Admin\SocialController::class, 'update'])->name('socials.update');
        Route::view('settings', 'dashboard.settings')->name('settings.index');
        Route::post('settings', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');

        Route::resource('translations', \App\Http\Controllers\Admin\TranslationController::class)->except(['destroy']);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->only(['index', 'show']);
        Route::get('/users/verify/{user}', [\App\Http\Controllers\Admin\UserController::class, 'verify'])->name('users.verify');
    });
});

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('{slug}', [\App\Http\Controllers\ProductController::class, 'category'])->name('products.category');
Route::get('{category}/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
