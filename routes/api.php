<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
$service = new \App\Services\XmlService();

Route::post('/travelclick', function () use ($service) {

    return $service->setContents('ping')->response();
});
Route::post('/travelclick/hotel-product-rq', function () use ($service){
    return $service->setContents('hotel-product-iq')->response();
});
