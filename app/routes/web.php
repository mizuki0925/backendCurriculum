<?php

use Illuminate\Support\Facades\Route;
// TODO:③不要コードは削除する
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PropertyController;

Route::get('/login', 'App\Http\Controllers\AccountController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AccountController@loginSubmit')->name('loginSubmit');
Route::get('/logout', 'App\Http\Controllers\AccountController@logout')->name('logout');


Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
    // アカウント一覧画面
    Route::get('/', 'App\Http\Controllers\AccountController@index')->name('index')->middleware('auth');
    // アカウント作成画面
    Route::get('/regist', 'App\Http\Controllers\AccountController@regist')->name('regist');

    Route::post('/regist', 'App\Http\Controllers\AccountController@create')->name('create');
    Route::get('/edit/{accountId}', 'App\Http\Controllers\AccountController@edit')->name('edit')->middleware('auth');
    Route::put('/{accountId}/update', 'App\Http\Controllers\AccountController@update')->name('update')->middleware('auth');
    Route::put('/{accountId}/delete', 'App\Http\Controllers\AccountController@delete')->name('delete')->middleware('auth');
    Route::get('/spec/{accountId}', 'App\Http\Controllers\AccountController@spec')->name('spec')->middleware('auth');
    Route::get('/csv-download', 'App\Http\Controllers\AccountController@downloadCsv')->name('downloadCsv');
    Route::get('/login', 'App\Http\Controllers\AccountController@login')->name('login');
    Route::post('/login', 'App\Http\Controllers\AccountController@loginSubmit')->name('loginSubmit');
    Route::get('/logout', 'App\Http\Controllers\AccountController@logout')->name('logout');
});
Route::group(['prefix' => 'property', 'as' => 'property.', 'middleware' => 'auth'], function () {
    Route::get('/', 'App\Http\Controllers\PropertyController@index')->name('index');
    Route::get('/regist', 'App\Http\Controllers\PropertyController@regist')->name('regist');
    Route::post('/regist', 'App\Http\Controllers\PropertyController@create')->name('create');
    Route::get('/edit/{realestateId}', 'App\Http\Controllers\PropertyController@edit')->name('edit');
    Route::put('/{realestateId}/update', 'App\Http\Controllers\PropertyController@update')->name('update');
    Route::get('/spec/{realestateId}', 'App\Http\Controllers\PropertyController@spec')->name('spec');
    Route::put('/{realestateId}/delete', 'App\Http\Controllers\PropertyController@delete')->name('delete');
    Route::get('/csv-download', 'App\Http\Controllers\PropertyController@downloadCsv')->name('downloadCsv');
});

require __DIR__ . '/auth.php';
