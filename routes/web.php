<?php

use Illuminate\Support\Facades\Route;

Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/customers/edit/{customer}', 'CustomerController@edit');
Route::get('/customers/create/', 'CustomerController@create');

Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/edit/{product}', 'ProductController@edit');
Route::get('/products/create/', 'ProductController@create');

Route::get('/sales', 'SalesController@index')->name('sales');
Route::get('/sales/create/', 'SalesController@create');
Route::post('/sales/process', 'SalesController@process');
Route::get('/sales/finish', 'SalesController@finish')->name('finishSale');
