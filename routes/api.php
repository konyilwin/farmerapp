<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Productcategories
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Producttags
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Faqcategories
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faqquestions
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    Route::post("products/search", "ProductApiController@search")->name("product.search");
    Route::get("products/get/{id}", "ProductApiController@getProduct");
});

Route::group(["prefix" => "v2", 'as' => 'api', 'namespace' => 'Api\V2'], function (){
    Route::post("check-user-exists", "UserController@checkUserExits");
    Route::post("store-user-info", "UserController@storeInfo");
    Route::post("get-locations", "LocationController@getLocations");
    Route::post("get-products", "ProductController@getProducts");
    Route::post("get-product-detail", "ProductController@getProductDetail");
    Route::post("get-products-from-search-log", "ProductController@getProductsFromSearchLog");
});
