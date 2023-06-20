<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
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

Route::get('/', function () {
    return view('welcome');
});
 
Route::middleware(['auth'])->group(function () {
    // Route::post('store/product','ProductosController@store')->name('store.product');
    Route::controller(ProductosController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::post('store/product', 'store')->name('store.product');
        Route::get('show/product/{id}', 'show')->name('show.product');
        Route::get('edit/product/{id}', 'edit')->name('edit.product');
        Route::post('update/product/{id}', 'update')->name('update.product');
        Route::get('destroy/product/{id}', 'destroy')->name('destroy.product');
    });
});
require __DIR__.'/auth.php';
