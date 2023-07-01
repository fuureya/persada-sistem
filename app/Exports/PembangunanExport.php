<?php

namespace App\Exports;

use App\Models\pembangunan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PembangunanExport implements FromQuery
{
    use Exportable;

    public $bulan;

    public function __construct($month)
    {
        $this->bulan = $month;
    }

    public function query()
    {
        return pembangunan::query()->whereMonth('tanggal', $this->bulan);
    }
}
