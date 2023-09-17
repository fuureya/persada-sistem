<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\PembangunanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftaranSmpController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PendaftarSmkController;
use App\Http\Controllers\PsgController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\TunggakanController;
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

// login
route::get("/login", [loginController::class, "loginPage"])->name('login')->middleware('guest');
route::post("/login", [loginController::class, "authenticate"])->middleware('guest');
route::get("/logout", [loginController::class, "logout"])->middleware('auth');

// Dashboard Routers
Route::get("/dashboard", [DashboardController::class, "index"])->middleware('auth');
Route::get("/dashboard/pendaftar-smp", [DashboardController::class, "pendaftarSmp"])->middleware('auth');
Route::get("/dashboard/pendaftar-smk", [DashboardController::class, "pendaftarSmk"])->middleware('auth');
// end Dashboard Routers

// Daftar siswa routers
Route::resource('/daftarsmp', PendaftaranSmpController::class)->middleware('auth');
Route::resource('/daftarsmk', PendaftarSmkController::class)->middleware('auth');

// dashboard keuangan panel route
Route::resource('/dashboard/pembayaran', PembayaranController::class)->middleware('auth');
Route::resource('/dashboard/semester', SemesterController::class)->middleware('auth');
Route::resource('/dashboard/spp', SppController::class)->middleware('auth');
Route::resource('/dashboard/lab', LabController::class)->middleware('auth');
Route::resource('/dashboard/psg', PsgController::class)->middleware('auth');
Route::resource('/dashboard/tunggakan', TunggakanController::class)->middleware('auth');
Route::resource('/dashboard/pembangunan', PembangunanController::class)->middleware('auth');


// export excel
Route::get('/pembayaran/export/{no_rekap}', [ExportController::class, "exportPembayaran"])->middleware('auth');
Route::get('/semester/export/{no_rekap}', [ExportController::class, "exportSemester"])->middleware('auth');
Route::get('/spp/export/{no_rekap}', [ExportController::class, "exportSpp"])->middleware('auth');
Route::get('/lab/export/{no_rekap}', [ExportController::class, "exportLab"])->middleware('auth');
Route::get('/psg/export/{no_rekap}', [ExportController::class, "exportLab"])->middleware('auth');
Route::get('/tunggakan/export/{no_rekap}', [ExportController::class, "exportTunggakan"])->middleware('auth');
Route::get('/pembangunan/export/{no_rekap}', [ExportController::class, "exportPembangunan"])->middleware('auth');

// report nota
Route::get('/pembayaran/nota/{id}', [PembayaranController::class, "printNota"])->middleware('auth');
