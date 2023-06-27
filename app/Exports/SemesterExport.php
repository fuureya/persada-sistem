<?php

namespace App\Exports;

use App\Models\semester;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class SemesterExport implements FromQuery
{
    use Exportable;

    public $bulan;

    public function __construct($month)
    {
        $this->bulan = $month;
    }

    public function query()
    {
        return semester::query()->whereMonth('tanggal', $this->bulan);
    }
}
