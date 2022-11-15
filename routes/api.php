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

Route::get('/produtos', 'ProdutosController@index');
Route::get('/produtos/{produtos}', 'ProdutosController@show');


Route::get('/image/{image}', 'ImageController@show');
Route::get('/image/first/{image}', 'ImageController@first');

Route::get('/cart', 'CartController@index');
Route::get('/cart/{cart}', 'CartController@show');
Route::post('/cart', 'CartController@store');
Route::put('/cart/{cart}', 'CartController@update');
Route::delete('/cart/{cart}', 'CartController@destroy');
