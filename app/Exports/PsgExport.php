<?php

namespace App\Exports;

use App\Models\psg;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PsgExport implements FromQuery
{
    use Exportable;

    public $bulan;

    public function __construct($month)
    {
        $this->bulan = $month;
    }

    public function query()
    {
        return psg::query()->whereMonth('tanggal', $this->bulan);
    }
}
