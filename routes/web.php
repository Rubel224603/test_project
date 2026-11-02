<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WelcomeController::class,'index'])->name('home.index');

// Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified',])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::middleware(['admin'])->group(function () {
    Route::get('dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/product-add',[AdminProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/product-store',[AdminProductController::class,'storeProduct' ])->name('admin.product.store');
    Route::get('/admin/product-list',[AdminProductController::class,'listProduct' ])->name('admin.product.list');
    Route::get('/admin/product-edit/{id}',[AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/admin/product-update/{id}',[AdminProductController::class, 'update'])->name('admin.product.update');
    Route::get('/admin/product-delete/{id}',[AdminProductController::class, 'delete'])->name('admin.product.delete');
});
