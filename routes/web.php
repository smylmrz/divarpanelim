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

Route::view('/', 'index')->name('home');

Route::get('/locale/{locale}', function($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::get('/orders/create/{product}', [\App\Http\Controllers\OrderController::class, 'create'])->name('orders.create');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function(){

    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])
        ->middleware('guest')->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'attempt'])->name('login.attempt');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('index');

        Route::resource('languages', \App\Http\Controllers\Admin\LanguageController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::get('/slider-details', [\App\Http\Controllers\Admin\SliderDetailController::class, 'show'])->name('slider-details.show');
        Route::put('/slider-details', [\App\Http\Controllers\Admin\SliderDetailController::class, 'update'])->name('slider-details.update');
    });

});

Route::get('/{slug}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
Route::get('/{category}/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
