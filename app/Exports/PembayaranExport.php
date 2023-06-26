<?php

namespace App\Exports;

use App\Models\pembayaran;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class pembayaranExport implements FromQuery
{
    use Exportable;

    public $bulan;

    public function __construct($month)
    {
        $this->bulan = $month;
    }

    public function query()
    {
        return pembayaran::query()->whereMonth('tanggal_bayar', $this->bulan);
    }
}
