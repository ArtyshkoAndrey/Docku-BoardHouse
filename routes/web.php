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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
  Route::get('/', [HomeController::class, 'index'])->name('index');
  Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');

  Route::resource('order', App\Http\Controllers\Admin\OrderController::class);
  Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
});
