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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/customers', 'CustomerController', ['except' => ['create', 'show', 'edit', 'destroy']]);
Route::resource('/suppliers', 'SupplierController', ['except' => ['create', 'show', 'edit', 'destroy']]);
Route::resource('/brands', 'BrandController', ['except' => ['create', 'show', 'edit', 'destroy']]);
Route::resource('/categories', 'CategoryController', ['except' => ['create', 'show', 'edit', 'destroy']]);
Route::resource('/products', 'ProductController', ['except' => ['create', 'show', 'edit', 'destroy']]);
Route::resource('/purchases', 'PurchaseController', ['except' => ['create', 'show', 'edit', 'update', 'destroy']]);
Route::resource('/sales', 'SaleController', ['except' => ['create', 'show', 'edit', 'update', 'destroy']]);