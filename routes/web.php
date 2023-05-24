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

Route::view('/', 'index');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function(){

    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])
        ->middleware('guest')->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'attempt'])->name('login.attempt');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('index');

        Route::resource('languages', \App\Http\Controllers\LanguageController::class);
    });

});
