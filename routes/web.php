<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('user.index');
})->name('index');

Route::get('/test', function () {
  $product = Product::first();
  $product->forceDelete();
})->name('test');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('product')->name('product.')->group( function () {
  Route::get('/search', [ProductController::class, 'search'])->name('search');
  Route::get('/all', [ProductController::class, 'all'])->name('all');
});

Route::prefix('cart')->name('cart.')->group( function () {
  Route::get('/', [CartController::class, 'index'])->name('index');
});

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
  Route::get('/', [HomeController::class, 'index'])->name('index');
  Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');

  Route::resource('order', App\Http\Controllers\Admin\OrderController::class);
  Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
  Route::post('product/photo/store', [\App\Http\Controllers\Admin\ProductController::class, 'photoStore'])->name('product.store.photo');
  Route::post('product/photo/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'photo'])->name('product.photo');
  Route::post('product/photo-delete', [\App\Http\Controllers\Admin\ProductController::class, 'photoDelete'])->name('product.photo.delete');
});
