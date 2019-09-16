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
});


Route::get('/products_foreach', 'GlobalController@getProducts_foreach');
Route::get('/products_leftjoin', 'GlobalController@getProducts_leftjoin');

Route::get('/products_foreach_category_1', 'GlobalController@getProducts_foreach_category_1');
Route::get('/products_eager_load_category_1', 'GlobalController@getProducts_eager_load_category_1');
Route::get('/products_leftjoin_category_1', 'GlobalController@getProducts_leftjoin_category_1');