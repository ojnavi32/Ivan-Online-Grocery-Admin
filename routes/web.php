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
    $product = \App\Models\Product::whereHas('categories', function ($q) {
            // $q->where('slug', 'softdrinks');
            $q->whereHas('parent', function ($w) {
                $w->where('slug', 'beverages');
            });
        })->get();
    return $product;

    // $product = \App\Models\Category::find(8)->whereHas('');
    // return $product->;
    // $categoryIds = $product->categories->pluck('id')->toArray();
    // return $categoryIds;
    return in_array(1, $categoryIds) ? 'selected':'no';
});

Auth::routes();

    #Category routes
    Route::resource('categories', 'CategoryController');

    #Product routes
    Route::resource('products', 'ProductController');

    #Customer routes
    Route::resource('customers', 'CustomerController');

Route::group(['prefix' => '/admin', 'middleware' => ''], function () {
    Route::get('/', 'AdminController@index')->name('admin');

    #Category routes
    // Route::resource('/categories', 'CategoryController');

    #Product routes
    // Route::resource('/products', 'ProductController');
});

Route::view('/home', 'layouts.dashboard');
// Route::get('/home', 'HomeController@index')->name('home');
