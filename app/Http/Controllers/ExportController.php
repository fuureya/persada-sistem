<?php

namespace App\Http\Controllers;

use App\Exports\PembayaranExport;
use App\Exports\SemesterExport;

class ExportController extends Controller
{
    //
    public function exportPembayaran() 
    {
        return (new PembayaranExport(last(request()->segments())))->download("Export Rekap Pembayaran Bulan " . last(request()->segments()) . " Tahun " . date("Y") . " sec " . date("i:sa") . ".xlsx");
  
    }

    public function exportSemester() 
    {
        return (new SemesterExport(last(request()->segments())))->download("Export Rekap Semester Bulan " . last(request()->segments()) . " Tahun " . date("Y") . " sec " . date("i:sa") . ".xlsx");
  
    }
}
