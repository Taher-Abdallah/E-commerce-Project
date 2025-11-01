<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\AtrributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth:admin','admin'])->group(function () {
        //################################### middleware admin for the admins inactive  ##############################
        //################################# Dashboard Module ##################################
        Route::view('/', 'admin.index')->name('dashboard');
        //################################# Roles Module ##################################
        Route::resource('roles', RoleController::class)->middleware('can:roles');
        //################################# Admin Module ##################################
        Route::middleware('can:admins')->group(function () {
            
            Route::resource('admins', AdminController::class);
            Route::get('admins/{admin}/status', [AdminController::class, 'changeStatus'])
                ->name('admins.status');
        });
        //################################# location Module ##################################
        Route::controller(LocationController::class)->middleware('can:global_shipping')->group(function () {
            //################################# countries Module ##################################
            Route::prefix('countries')->name('countries.')->group(function () {
                Route::get('/', 'countries')->name('index');
                Route::get('/{id}/status', 'changeStatus')->name('status');
            });
            //################################# governorates Module ##################################
            Route::prefix('governorates')->name('governorates.')->group(function () {
                Route::put('/shipping-price', 'shipping')->name('shipping');
                Route::get('/{id}/status', 'changeGoverStatus')->name('status');
            });
            Route::get('countries/{id}/governorate', 'getGovernorateByCountry')->name('governorates.index');

        });

        //################################# Category Module ##################################
        Route::middleware('can:categories')->group(function () {
        Route::get('categories/get-all', [CategoryController::class, 'getDataTable'])->name('categories.get');
        Route::resource('categories', CategoryController::class);
        });

        //################################# Brand Module ##################################
        Route::middleware('can:brands')->group(function () {
        Route::get('brands/get-all', [BrandController::class, 'getDataTable'])->name('brands.get');
        Route::resource('brands', BrandController::class);
        });



        //################################# coupon Module ##################################
        Route::middleware('can:coupons')->group(function () {
        Route::get('coupons/get-all', [CouponController::class, 'getDataTable'])->name('coupon.get');
        Route::resource('coupons', CouponController::class);
        });
        //################################# Faqs Module ##################################
        Route::middleware('can:faqs')->group(function () {
            Route::resource('faqs', FaqsController::class);
        });
        //################################# settings Module ##################################
        Route::middleware('can:settings')->group(function () {
            Route::resource('settings', SettingController::class)->only(['show', 'update']);
        });
        //################################# coupon Module ##################################
        Route::middleware('can:attributes')->group(function () {
        Route::get('attributes/get-all', [AtrributeController::class, 'getDataTable'])->name('attributes.get');
        Route::resource('attributes', AtrributeController::class);
        });
        //################################# product Module ##################################
        Route::middleware('can:products')->group(function () {
        Route::get('products/get-all', [ProductController::class, 'getDataTable'])->name('products.get');
        Route::post('/products/image/{id}', [ProductController::class, 'deleteImage'])->name('products.delete-image');
        Route::resource('products', ProductController::class);
        });

        //################################# Users Module ##################################
        Route::middleware('can:users')->group(function () {
            Route::get('users/get-all', [UserController::class, 'getDataTable'])->name('users.get');
            Route::resource('users', UserController::class);
        });        
        
        

    });
    require __DIR__ . '/AdminAuth.php';
});




require __DIR__.'/auth.php';
