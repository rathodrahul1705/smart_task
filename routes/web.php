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


// ============ Rout product crud start=========================

Route::get('product_view','ProductController@ProcuctIndex');
Route::get('product_create','ProductController@ProcuctCreate');
Route::post('product_save','ProductController@productSave');
Route::get('product_details/{product_id}','ProductController@productView');
Route::get('product_edit/{product_id}','ProductController@productEdit');
Route::post('product_update/{product_id}','ProductController@productUpdate');
Route::get('product_delete/{product_id}','ProductController@productDelete');

// ============ Rout product crud start====================

Route::get('product_size','ProductController@productSize');
Route::get('product_size_create','ProductController@productSizeCreate');
Route::post('product_size_save','ProductController@productSizeSave');
Route::get('product_size_edit/{size_id}','ProductController@productSizeEdit');
Route::get('product_size_view/{size_id}','ProductController@productSizeView');
Route::post('product_size_update/{size_id}','ProductController@productSizeUpdate');
Route::get('product_size_delete/{size_id}','ProductController@productSizeDelete');

// ============ Rout product size crud end======================

// ============ Rout product category crud start================

Route::get('product_category','ProductController@productCategory');
Route::get('product_category_create','ProductController@ProductCategoryCreate');
Route::post('product_category_save','ProductController@ProductCategorySave');
Route::get('product_category_edit/{category_id}','ProductController@ProductCategoryEdit');
Route::post('product_category_update/{cat_id}','ProductController@ProductCategoryUpdate');
Route::get('product_category_list/{category_id}','ProductController@productCategoryList');
Route::get('product_category_delete/{category_id}','ProductController@productCategoryDelete');

// ============ Route product  category crud end==================
