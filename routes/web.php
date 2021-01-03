<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('user.index');
})->name('index');

Route::get('/test', function () {
  $product = \App\Models\Product::first();
  $product->forceDelete();
})->name('test');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('product')->name('product.')->group( function () {
  Route::get('/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('search');
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
