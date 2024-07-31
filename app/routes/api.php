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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 動作確認用API
Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
    Route::get('/getData/{data}', 'App\Http\Controllers\Api\TestController@getData')->name('test.getData');
    Route::post('/getData', 'App\Http\Controllers\Api\TestController@getData')->name('test.getData');
    Route::get('/getPrefectures', 'App\Http\Controllers\Api\TestController@getPrefectures')->name('test.getPrefectures');
    Route::get('/getCities/{preCode}', 'App\Http\Controllers\Api\TestController@getCities')->name('test.getCities');
});
