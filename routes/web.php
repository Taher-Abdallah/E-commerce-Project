<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.index')->name('dashboard')->middleware('admin');
    require __DIR__ . '/AdminAuth.php';

    Route::resource('roles', RoleController::class)->middleware(['admin']);
});



//============================================================================ Role Resource



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
