<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProgramStudiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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
    Route::get(
        '/admin/dashboard',
        [AuthController::class, 'dashboard']
    );


    /*
    |--------------------------------------------------------------------------
    | Mahasiswa
    |--------------------------------------------------------------------------
    */

    // Tampil data
    Route::get(
        '/admin/mahasiswa',
        [MahasiswaController::class, 'index']
    );

    // Tambah
    Route::post(
        '/admin/mahasiswa/store',
        [MahasiswaController::class, 'store']
    );

    // Edit
    Route::put(
        '/admin/mahasiswa/update/{id}',
        [MahasiswaController::class, 'update']
    );

    // Hapus
    Route::delete(
        '/admin/mahasiswa/delete/{id}',
        [MahasiswaController::class, 'destroy']
    );

    // Export Excel
    Route::get(
        '/admin/mahasiswa/export',
        [MahasiswaController::class, 'export']
    );


    /*
    |--------------------------------------------------------------------------
    | Program Studi
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/program-studi',
        [ProgramStudiController::class, 'index']
    );


    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/logout',
        [AuthController::class, 'logout']
    );

});