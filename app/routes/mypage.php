<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mypage\LoginController;
use App\Http\Controllers\Mypage\HomeController;

Route::prefix('mypage')->group(function(){
    Route::get('/',[HomeController::class, 'dashboard'])->name('mypage.dashboard');

    Route::get('login',[LoginController::class, 'index'])->name('mypage.login.index');
    Route::post('login-page',[LoginController::class, 'login'])->name('mypage.login.login');
    Route::get('logout',[LoginController::class, 'logout'])->name('mypage.login.logout');
});

Route::prefix('mypage')->middleware('auth.members:members')->group(function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('mypage.dashboard');
});