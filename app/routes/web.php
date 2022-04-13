<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::group(['prefix' => 'account', 'as' => 'account.'], function() {
    Route::get('/', 'App\Http\Controllers\AccountController@index')->name('index');
    Route::get('/regist', 'App\Http\Controllers\AccountController@regist')->name('regist');
    Route::get('/edit', 'App\Http\Controllers\AccountController@edit')->name('edit');
    Route::get('/spec', 'App\Http\Controllers\AccountController@spec')->name('spec');
});
Route::group(['prefix' => 'property', 'as' => 'property.'], function() {
    Route::get('/', 'App\Http\Controllers\PropertyController@index')->name('index');
    Route::get('/regist', 'App\Http\Controllers\PropertyController@regist')->name('regist');
    Route::get('/edit', 'App\Http\Controllers\PropertyController@edit')->name('edit');
    Route::get('/spec', 'App\Http\Controllers\PropertyController@spec')->name('spec');
});


require __DIR__.'/auth.php';
