<?php

use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::name('user.')->group(function () {

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/profile', 'profile')->middleware('auth')->name('profile');
    });
    
    require __DIR__ . '/auth.php';
});

