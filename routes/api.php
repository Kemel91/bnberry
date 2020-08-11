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

Route::middleware('xml')->prefix('travelclick')->group(function () {
    Route::post('/', 'TravelClickController@ping');
    Route::post('/hotel-product-rq', 'TravelClickController@hotelProductRQ');
});
