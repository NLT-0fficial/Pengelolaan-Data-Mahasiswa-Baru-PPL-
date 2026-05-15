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

Route::get(
    '/login',
    [AuthController::class, 'loginForm']
);

Route::post(
    '/login',
    [AuthController::class, 'login']
);


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/dashboard',
        [AuthController::class, 'dashboard']
    );


    /*
    |--------------------------------------------------------------------------
    | Mahasiswa
    |--------------------------------------------------------------------------
    */

    // tampil data + search
    Route::get(
        '/admin/mahasiswa',
        [MahasiswaController::class, 'index']
    );

    // generate nim otomatis
    Route::get(
        '/admin/generate-nim',
        [MahasiswaController::class, 'generateNim']
    );

    // tambah
    Route::post(
        '/admin/mahasiswa/store',
        [MahasiswaController::class, 'store']
    );

    // edit
    Route::put(
        '/admin/mahasiswa/update/{id}',
        [MahasiswaController::class, 'update']
    );

    // hapus
    Route::delete(
        '/admin/mahasiswa/delete/{id}',
        [MahasiswaController::class, 'destroy']
    );

    // export excel
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