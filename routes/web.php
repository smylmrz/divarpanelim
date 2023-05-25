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
    });

});

Route::get('/{slug}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
