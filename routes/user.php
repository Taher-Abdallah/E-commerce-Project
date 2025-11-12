<?php

use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::name('user.')->group(function () {

    Route::controller(HomeController::class)->group(function () {
        Route::get('/profile', 'profile')->middleware('auth')->name('profile');
        Route::get('/', 'index')->name('index');
        Route::get('/faqs', 'faqs')->name('faqs');
        Route::get('/terms', 'terms')->name('terms');
        Route::get('/privacy', 'privacy')->name('privacy');

    });
    
    require __DIR__ . '/auth.php';
});

