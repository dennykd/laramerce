<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ApiOngkirController;
use App\Http\Controllers\MidtransApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ApiOngkirController::class)->group(function () {
    Route::get('/province', 'getProvince');
    Route::get('/city', 'getCity');
    Route::get('/cost', 'getCost');
});

Route::controller(AjaxController::class)->group(function () {
    Route::get('/get-product/{product_code}', 'getProductData');
    Route::post('/add-to-cart', 'addToCart');
    Route::post('/remove-product-cart', 'removeProductCart');
    Route::post('/add-to-wishlist', 'addToWishlist');
    Route::post('/remove-product-wishlist', 'removeProductWishlist');
    Route::get('/update-cart-quantity', 'updateCartQuantity');
});

Route::controller(MidtransApiController::class)->group(function () {
    Route::post('/payment-notification', 'paymentNotif')->name('payment_notif');
});
