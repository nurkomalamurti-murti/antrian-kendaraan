<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegister']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('kendaraan', KendaraanController::class);

    Route::resource('antrian', AntrianController::class);

    Route::get('/laporan/kendaraan', [LaporanController::class, 'kendaraan'])
        ->name('laporan.kendaraan');

    Route::get('/laporan/antrian', [LaporanController::class, 'antrian'])
        ->name('laporan.antrian');
});