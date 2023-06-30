<?php

namespace App\Exports;

use App\Models\lab;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class LabExport implements FromQuery
{
    use Exportable;

    public $bulan;

    public function __construct($month)
    {
        $this->bulan = $month;
    }

    public function query()
    {
        return lab::query()->whereMonth('tanggal', $this->bulan);
    }
}
