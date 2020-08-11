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

Route::post('/travelclick', function () {
    $post = request()->post();
    if (count($post) > 0) {
        $text = implode(',', array_keys($post)) . ' - ' . implode(',', array_values($post));
        file_put_contents(base_path('post.txt'), $text);
    }
    $service= new \App\Services\XmlService();
    return $service->setContents('ping')->response();
});
