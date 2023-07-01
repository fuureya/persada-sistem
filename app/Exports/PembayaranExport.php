<?php

namespace App\Exports;

use App\Models\pembayaran;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class pembayaranExport implements FromQuery, WithHeadings
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
           ['NO', 'Tanggal Bayar', 'Nama Siswa', 'NIS', 'Kelas', 'Uang Pembangunan', 'Uang SPP', 'Uang Lab', 'Semester Ganjil', 'Semester Genap', 'Uang PSG', 'Uang UAS', 'Tunggakan', 'Keterangan']
        ];
    }

    public function query()
    {
        return pembayaran::query()->whereMonth('tanggal_bayar', $this->bulan);
    }
}
