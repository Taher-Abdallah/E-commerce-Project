<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\SettingController;

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

        


    });
    require __DIR__ . '/AdminAuth.php';
});



//============================================================================ Role Resource



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
