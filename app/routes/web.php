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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::get('/regist', [AccountController::class, 'regist'])->name('regist');
    Route::get('/edit', [AccountController::class, 'edit'])->name('edit');
    Route::get('/spec', [AccountController::class, 'spec'])->name('spec');
    Route::get('/login', [AccountController::class, 'login'])->name('login');
});
Route::group(['prefix' => 'property', 'as' => 'property.'], function () {
    Route::get('/', [PropertyController::class, 'index'])->name('index');
    Route::get('/regist', [PropertyController::class, 'regist'])->name('regist');
    Route::get('/edit', [PropertyController::class, 'edit'])->name('edit');
    Route::get('/spec', [PropertyController::class, 'spec'])->name('spec');
});

require __DIR__ . '/auth.php';
