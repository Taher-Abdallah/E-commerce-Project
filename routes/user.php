<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\BrandController;
use App\Http\Controllers\User\ProductController;

Route::name('user.')->group(function () {
Route::view('/cars', 'user.car')->name('cars');
Route::view('/cars-shop', 'user.cars-shop')->name('carss');
    Route::controller(HomeController::class)->group(function () {
        Route::get('/profile', 'profile')->middleware('auth')->name('profile');
        Route::get('/', 'index')->name('index');
        Route::get('/faqs', 'faqs')->name('faqs');
        Route::get('/terms', 'terms')->name('terms');
        Route::get('/privacy', 'privacy')->name('privacy');
    });

    #####################################for brands and categories ################################################
    Route::controller(BrandController::class)->group(function () {
        Route::get('/brands', 'index')->name('brands.index');
        Route::get('/brands/{slug}/products', 'showBrands')->name('brands.show');
        
        Route::get('/category', 'category')->name('category');
        Route::get('/category/{slug}/products', 'showCategory')->name('category.show');
    });
    ####################################Product Controller #################################################
    Route::prefix('/products')->name('products.')->controller(ProductController::class)->group(function () {
        Route::get('/show/{slug}', 'showProductPage')->name('show');
        Route::get('/{type}', 'getProductType')->name('type');
        Route::get('/related-items/{slug}', 'getRelatedItems')->name('related.items');
    });

    


    
    require __DIR__ . '/auth.php';
});

