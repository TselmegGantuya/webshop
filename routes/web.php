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
    return redirect('home');
});
Route::resource('/home', 'HeadController');

Route::get('/categories', 'CategoriesController@index');
Route::get('/categorie/get/{id}', 'CategoriesController@get');
Route::get('/articles', 'ArticlesController@index');
Route::get('/article/get/{id}', 'ArticlesController@get');
Route::get('/categories/attach/{id}/{atr_id}', 'CategoriesController@attachArticle');
Route::get('/categories/detach/{id}/{atr_id}', 'CategoriesController@detachArticle');
Route::post('/shop/add', 'ShoppingController@add');
Route::post('/shop/delete', 'ShoppingController@delete');
Route::post('/shop/order', 'ShoppingController@order');	
Route::get('/shop', 'ShoppingController@index');

Auth::routes();