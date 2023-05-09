<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranSmpController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PendaftarSmkController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

// Dashboard Routers
Route::get("/dashboard", [DashboardController::class, "index"]);
Route::get("/dashboard/pendaftar-smp", [DashboardController::class, "pendaftarSmp"]);
Route::get("/dashboard/pendaftar-smk", [DashboardController::class, "pendaftarSmk"]);
// end Dashboard Routers

// Daftar siswa routers
Route::resource('/daftarsmp', PendaftaranSmpController::class);
Route::resource('/daftarsmk', PendaftarSmkController::class);