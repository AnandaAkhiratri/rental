<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReversionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('',[AuthController::class,'login'])->name('login');
Route::post('',[AuthController::class,'loginProcess'])->name('login.process');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('register',[AuthController::class,'registerProcess'])->name('register.process');

Route::get('/halaman', [DashboardController::class,'index']);

Route::middleware(["auth"])->group(function () {
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');

    Route::resource('user',DashboardController::class);
    Route::resource('car',CarController::class);
    Route::resource('rent',LoanController::class);
    Route::post('rent-update-status/{loan}',[LoanController::class,'updateStatus'])->name('rent.update-status');
    Route::get('get-car/{car?}',[LoanController::class,'getCar'])->name('rent.get-car');
    Route::resource('return',ReversionController::class);
});