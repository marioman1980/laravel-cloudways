<?php

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
})->middleware(['auth.shop'])->name('home');

Route::get('shopify', 'ShopifyController@index')->middleware(['auth.shop']);
Route::get('test', 'ShopifyController@test')->middleware(['auth.shop']);
Route::get('test_customer_update/{customer_id}', 'ShopifyController@test_customer_update')->middleware(['auth.shop']);
Route::get('refer_to_test_customer_update/{customer_id}', 'ShopifyController@refer_to_test_customer_update')->middleware(['auth.shop']);

Route::get('/proxy/{customer_id}/{tax_status}', 'AppProxyController@index')->middleware('auth.proxy');