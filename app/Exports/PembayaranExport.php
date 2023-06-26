<?php

namespace App\Exports;

use App\Models\pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class PembayaranExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return pembayaran::all();
    }
}
