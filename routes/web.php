<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;


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
            Route::prefix('countries')->name('countries.')->group(function () {
                Route::get('/', 'countries')->name('index');
                Route::get('/{id}/status', 'changeStatus')->name('status');
            });
            Route::prefix('governorates')->name('governorates.')->group(function () {
                Route::put('/shipping-price', 'shipping')->name('shipping');
                Route::get('/{id}/status', 'changeGoverStatus')->name('status');
            });
            Route::get('countries/{id}/governorate', 'getGovernorateByCountry')->name('governorates.index');

        });

    });
    require __DIR__ . '/AdminAuth.php';
});



//============================================================================ Role Resource



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
