<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('inventario-principal','App\Http\Controllers\inventario\inventarioController@inventarioIndex');
    Route::get('editar-inventario','App\Http\Controllers\inventario\inventarioController@editInventory');
    Route::get('añadir-producto','App\Http\Controllers\inventario\inventarioController@addProductIndex');
    Route::post('añadir-producto-inventario','App\Http\Controllers\inventario\inventarioController@addProduct');

    //Venta sección
    Route::get('ventas','App\Http\Controllers\venta\ventaController@ventaIndex');

    //Facturas sección
    Route::get('facturas','App\Http\Controllers\factura\facturaController@facturaIndex');



});
