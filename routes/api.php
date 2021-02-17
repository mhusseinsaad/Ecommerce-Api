<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route for product
Route::apiresource('/products', 'ProductController');


// Route for Reviews

Route::group(['prefix' => 'products'], function () {
    Route::apiresource('/{products}/reviews', 'ReviewController');
});
