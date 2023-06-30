<?php

namespace App\Exports;

use App\Models\spp;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class SppExport implements FromQuery
{
    use Exportable;

    public $bulan;

    public function __construct($month)
    {
        $this->bulan = $month;
    }

    public function query()
    {
        return spp::query()->whereMonth('tanggal', $this->bulan);
    }
}
