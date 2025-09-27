<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth:admin','admin'])->group(function () {
        Route::view('/', 'admin.index')->name('dashboard');
        Route::resource('roles', RoleController::class);
        Route::resource('admins', AdminController::class);
        Route::get('admins/{admin}/status', [AdminController::class, 'changeStatus'])
            ->name('admins.status');
            });
    require __DIR__ . '/AdminAuth.php';
});



//============================================================================ Role Resource



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
