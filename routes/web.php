<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });
Route::get('/health', fn () => response()->json(['status' => 'ok']));

// Route::post('/register', [RegisteredUserController::class, 'store'])
//     ->middleware(['guest','RegisterMiddleware'])
//     ->name('register');

// Route::post('/login', [LoginController::class, 'store'])
//     ->middleware(['guest','LoginMiddleware'])
//     ->name('login');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');



Route::prefix('admin')->middleware(['auth', 'role:admin|employee'])->group(function () {    // Product Routes
    Route::get('/', function () {
        return redirect()->route('admin.products');
    });
    Route::get('/products', [ProductController::class, 'index'])->middleware('permission:view products')->name('admin.products');
    Route::get('/product/create', [ProductController::class, 'create'])->middleware('permission:create products')->name('admin.create.product');
    Route::get('/product/{id}', [ProductController::class, 'show'])->middleware('permission:manage products')->name('admin.product.show');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->middleware('permission:update products')->name('admin.product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('permission:update products')->name('admin.product.update');
    Route::post('/product/store', [ProductController::class, 'store'])->middleware('permission:create products')->name('admin.product.store');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->middleware('permission:delete products')->name('admin.product.delete');

    // Category Routes
    Route::get('/categories', [CategoryController::class, 'index'])->middleware('permission:view categories')->name('admin.categories');
    Route::get('/category/create', [CategoryController::class, 'create'])->middleware('permission:create categories')->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->middleware('permission:create categories')->name('admin.category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->middleware('permission:update categories')->name('admin.category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->middleware('permission:update categories')->name('admin.category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->middleware('permission:delete categories')->name('admin.category.delete');
});

require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
