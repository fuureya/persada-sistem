<?php

namespace App\Http\Controllers;

use App\Exports\PembayaranExport;

class ExportController extends Controller
{
    //
    public function exportPembayaran() 
    {
        return (new PembayaranExport(last(request()->segments())))->download("Export Rekap Bulan " . last(request()->segments()) . " Tahun " . date("Y") . " sec " . date("i:sa") . ".xlsx");
  
    }
}
