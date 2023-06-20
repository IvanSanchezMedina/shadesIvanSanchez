<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PruebaTecnicaController;
use App\Http\Controllers\Coche;
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
Route::controller(PruebaTecnicaController::class)->group(function () {
    Route::get('holamundo', 'holaMundo');
    Route::get('sumar', 'operaciones');
    Route::get('consulta', 'consulta');
    Route::get('numerospares', 'numerosPares');
    Route::get('leerArchivo', 'leerArchivo');
    Route::get('consultaUpdate', 'consultaUpdate');
    Route::get('coche', 'nuevoCoche');
});
Route::controller(Coche::class)->group(function () {
    Route::get('coche', 'nuevoCoche');
});

Route::middleware(['auth'])->group(function () {
   
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
