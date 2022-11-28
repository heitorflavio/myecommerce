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

/* A way to create a route to the controller. */
Route::get('/produtos', 'ProdutosController@index');
Route::get('/produtos/query', 'ProdutosController@query');
Route::get('/produtos/{produtos}', 'ProdutosController@show');

/* A way to get the image from the database. */

Route::get('/image/{image}', 'ImageController@show');
Route::get('/image/first/{image}', 'ImageController@first');

/* Creating a route to the controller. */
Route::get('/cart', 'CartController@index');
Route::post('/carts', 'CartController@show');
Route::post('/cart', 'CartController@store');
Route::put('/cart/{cart}', 'CartController@update');
Route::delete('/cart/{cart}', 'CartController@destroy');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

/* A way to authenticate the user. */
Route::post('login', 'CustomerController@login');
Route::post('register', 'CustomerController@store');
Route::post('me', 'CustomerController@me');


/* Creating a route to the controller. */
Route::post('/wishlist', 'WishlistController@show');
Route::post('/wish', 'WishlistController@store');
Route::delete('/wish/{id}', 'WishlistController@destroy');
