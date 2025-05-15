<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\CategoryController;
// Route::get('/health', fn () => response()->json(['status' => 'ok']));

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

//     Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
//     Route::get('/product/{id}', [ProductController::class, 'show'])->name('admin.product.show');
//     Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
//     Route::delete('/product/{id}', [ProductController::class, 'delete_product'])->name('admin.product.delete');

//     Route::get('/categories', [CategoryController::class, 'list_categories'])->name('admin.category');
//     Route::get('/category/{id}', [CategoryController::class, 'create'])->name('admin.category.create');
//     Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
//     Route::delete('/category/{id}', [CategoryController::class, 'delete_product'])->name('admin.category.delete');

// });
require __DIR__.'/auth.php';
