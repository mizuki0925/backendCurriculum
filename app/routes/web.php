<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PropertyController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ログイン画面とログイン処理
Route::get('account/login', [AccountController::class, 'login'])->name('account.login');
Route::post('account/logon', [AccountController::class, 'logon'])->name('account.logon');
Route::get('account/logout', [AccountController::class, 'logout'])->name('account.logout');

Route::group(['prefix' => 'account', 'as' => 'account.', 'middleware' => 'login'], function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::get('/regist', [AccountController::class, 'regist'])->name('regist');
    Route::post('/add', [AccountController::class, 'add'])->name('add');
    Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('edit');
    Route::post('/update', [AccountController::class, 'update'])->name('update');
    Route::post('/delete', [AccountController::class, 'delete'])->name('delete');
    Route::post('/csv', [AccountController::class, 'csvDownlord'])->name('csv');
    Route::get('/spec/{id}', [AccountController::class, 'spec'])->name('spec');
});
Route::group(['prefix' => 'property', 'as' => 'property.', 'middleware' => 'login'], function () {
    Route::get('/', [PropertyController::class, 'index'])->name('index');
    Route::get('/regist', [PropertyController::class, 'regist'])->name('regist');
    Route::get('/edit', [PropertyController::class, 'edit'])->name('edit');
    Route::get('/spec', [PropertyController::class, 'spec'])->name('spec');
});

require __DIR__ . '/auth.php';
