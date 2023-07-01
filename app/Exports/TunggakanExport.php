<?php

namespace App\Exports;

use App\Models\tunggakan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class TunggakanExport implements FromQuery
{
    use Exportable;

    public $bulan;

    public function __construct($month)
    {
        $this->bulan = $month;
    }

    public function query()
    {
        return tunggakan::query()->whereMonth('tanggal', $this->bulan);
    }
}
