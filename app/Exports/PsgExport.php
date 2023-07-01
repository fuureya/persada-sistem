<?php

namespace App\Exports;

use App\Models\psg;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PsgExport implements FromQuery, WithHeadings
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
        return psg::query()->whereMonth('tanggal', $this->bulan);
    }
}
