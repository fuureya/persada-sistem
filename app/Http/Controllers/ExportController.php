<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public function exportPembayaran() 
    {
        return Excel::download(new PembayaranExport, 'pembayaran.xlsx');
        
    }
}
