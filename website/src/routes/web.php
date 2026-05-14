<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProgramStudiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'loginForm']);

Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard']);

    // Mahasiswa
    Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index']);

    // Program Studi
    Route::get('/admin/program-studi', [ProgramStudiController::class, 'index']);

    // Logout
    Route::get('/logout', [AuthController::class, 'logout']);

});