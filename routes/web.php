<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IbuController;
use App\Http\Controllers\IbuUserController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\BalitaUserController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\settingController;

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
//     return view('lamanhome.home', [
//         'title' => 'Home'
//     ]);
// });

Route::controller(LayoutController::class)->group(function(){
    Route::get('/', 'index')->middleware('auth');
    Route::get('home', 'index')->middleware('auth');
});

// Route::get('settings', [settingController::class, 'index'])->middleware('auth');
Route::get('/settings/{id}/edit', [settingController::class, 'edit'])->middleware('auth');
Route::post('/settings/update/{id}', [settingController::class, 'update'])->middleware('auth');

Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
    Route::get('daftar', 'daftar')->name('daftar');
    Route::post('daftar/daftarPosyandu', 'daftarPosyandu');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CekAuth:1']], function () {
        Route::resource('penimbangan', PenimbanganController::class);
        Route::resource('data-anak', BalitaController::class);
        // Route::post('/data-anak/update/{id}', [BalitaController::class, 'update']);
        Route::resource('data-ibu', ibuController::class);
        // Route::resource('panel-jadwal', JadwalController::class);
        // Route::resource('petugas', petugasController::class);       
    });
    Route::group(['middleware' => ['CekAuth:2']], function () {
        Route::resource('balita', balitaUserController::class);
        Route::resource('ibu', IbuUserController::class);
        Route::resource('pemeriksaan', PemeriksaanController::class);
    });
});

// Route::resource('data-anak', BalitaController::class);

// Route::get('/data-anak', function () {
//     return view('lamananak.dataAnak', [
//         'title' => 'Data Anak'
//     ]);
// });
