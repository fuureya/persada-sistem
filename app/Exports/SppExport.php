<?php

namespace App\Exports;

use App\Models\spp;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SppExport implements FromQuery, WithHeadings
{
    use Exportable;

    public $bulan;

    public function __construct($month)
    {
        $this->bulan = $month;
    }

    public function headings(): array
    {
        return [
           ['NO', 'Tanggal', 'Kode', 'Uraian', 'Penerimaan', 'Pengeluaran']
        ];
    }


    public function query()
    {
        return spp::query()->whereMonth('tanggal', $this->bulan);
    }
}
