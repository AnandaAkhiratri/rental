<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('/admin')->group(function(){

    
    Route::get('/dashboard', function(){
        return view('admin.layouts.wrapper');
    });
    

    Route::get('/halaman', [DashboardController::class,'index']);
    
    Route::get('/mobil/index', [CarController::class, 'index']);
    Route::get('/mobil/create', [CarController::class, 'create']); 
    Route::post('/mobil/create', [CarController::class, 'store']); 
    Route::get('/mobil/{id}', [CarController::class, 'show']); 
    Route::get('/mobil/{id}/edit', [CarController::class, 'edit']); 
    Route::put('/mobil/{id}', [CarController::class, 'update']); 
    Route::delete('/mobil/{id}', [CarController::class, 'destroy']); 
});