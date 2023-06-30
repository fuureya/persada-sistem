<?php

namespace App\Http\Controllers;

use App\Exports\PembayaranExport;
use App\Exports\SemesterExport;
use App\Exports\SppExport;
use App\Exports\LabExport;
use App\Exports\PsgExport;

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

    public function exportSpp() 
    {
        return (new SppExport(last(request()->segments())))->download("Export Rekap Spp Bulan " . last(request()->segments()) . " Tahun " . date("Y") . " sec " . date("i:sa") . ".xlsx");
  
    }

    public function exportLab() 
    {
        return (new LabExport(last(request()->segments())))->download("Export Rekap Lab Bulan " . last(request()->segments()) . " Tahun " . date("Y") . " sec " . date("i:sa") . ".xlsx");
    }
    
    public function exportPsg() 
    {
        return (new PsgExport(last(request()->segments())))->download("Export Rekap Lab Bulan " . last(request()->segments()) . " Tahun " . date("Y") . " sec " . date("i:sa") . ".xlsx");
    }
    
}
