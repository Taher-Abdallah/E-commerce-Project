<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\BrandController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\WishlistController;

Route::name('user.')->group(function () {

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

    Route::middleware('auth:web')->group(function () {
        ############################### Wishlist Controller ################################################    
        Route::get('/wishlist', WishlistController::class)->name('wishlist');
        Route::get('/cart', CartController::class)->name('cart');
        ############################### Checkout Controller ################################################
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');

        
    });

        // LiveWire
        Livewire::setUpdateRoute(function ($page) {
            return Route::post('livewire/update', $page)->name('livewire.update');
        });
    
    require __DIR__ . '/auth.php';
});

