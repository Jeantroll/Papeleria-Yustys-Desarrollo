<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sumar-producto/{idProd}/{cantidadProd}','App\Http\Controllers\venta\ventaController@webServiceTotalQuantity');
Route::get('productopre/{idFactura}','App\Http\Controllers\venta\ventaController@webServiceQueryProductsFact');
Route::get('/productsByName','App\Http\Controllers\venta\ventaController@getProductsByName')->name('products.getProductsByName');