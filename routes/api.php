<?php

$version = env('API_VERSION');

Route::group(['namespace' => 'API', 'prefix' => $version], function () {

    #Category API routes
    Route::group(['prefix' => 'categories'], function () {
        Route::get('lists', 'Category@lists');
        Route::post('children', 'Category@children');
        Route::post('single-search', 'Category@singleSearch');
    });

    #Product API routes
    Route::group(['prefix' => 'products'], function () {
        Route::get('single/{name}', 'Product@single');
        Route::get('hot-deals', 'Product@hotDeals');
        Route::get('best-sellers', 'Product@bestSellers');
        Route::post('by-category', 'Product@byCategory');
    });

    #Authenticated API routes
    Route::group(['middleware' => 'auth:api'], function () {

        #Customer API routes
        Route::group(['prefix' => 'customers'], function () {
            Route::get('initialize', 'Customer@initialize');
        });
    });
});
