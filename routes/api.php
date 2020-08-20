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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customers', 'CustomerController@get');
Route::post('/customers', 'CustomerController@post');
Route::put('/customers/{customer}', 'CustomerController@update');
Route::delete('/customers/{customer}', 'CustomerController@delete');

Route::get('/products', 'ProductController@get');
Route::post('/products', 'ProductController@post');
Route::put('/products/{product}', 'ProductController@update');
Route::delete('/products/{product}', 'ProductController@delete');

Route::post('/sales', 'SalesController@store');


