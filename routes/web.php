<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\PembangunanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftaranSmpController;
use App\Http\Controllers\PendaftarController;
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

// Dashboard Routers
Route::get("/dashboard", [DashboardController::class, "index"]);
Route::get("/dashboard/pendaftar-smp", [DashboardController::class, "pendaftarSmp"]);
Route::get("/dashboard/pendaftar-smk", [DashboardController::class, "pendaftarSmk"]);
// end Dashboard Routers

// Daftar siswa routers
Route::resource('/daftarsmp', PendaftaranSmpController::class);
Route::resource('/daftarsmk', PendaftarSmkController::class);

// dashboard keuangan panel route
Route::resource('/dashboard/pembayaran', PembayaranController::class);
Route::resource('/dashboard/semester', SemesterController::class);
Route::resource('/dashboard/spp', SppController::class);
Route::resource('/dashboard/lab', LabController::class);
Route::resource('/dashboard/psg', PsgController::class);
Route::resource('/dashboard/tunggakan', TunggakanController::class);
Route::resource('/dashboard/pembangunan', PembangunanController::class);


// export excel
Route::get('/pembayaran/export/{no_rekap}', [ExportController::class, "exportPembayaran"]);
Route::get('/semester/export/{no_rekap}', [ExportController::class, "exportSemester"]);
Route::get('/spp/export/{no_rekap}', [ExportController::class, "exportSpp"]);
Route::get('/lab/export/{no_rekap}', [ExportController::class, "exportLab"]);
Route::get('/psg/export/{no_rekap}', [ExportController::class, "exportLab"]);
Route::get('/tunggakan/export/{no_rekap}', [ExportController::class, "exportTunggakan"]);
Route::get('/pembangunan/export/{no_rekap}', [ExportController::class, "exportPembangunan"]);