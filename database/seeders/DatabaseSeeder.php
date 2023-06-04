<?php

namespace Database\Seeders;

use App\Models\lab;
use App\Models\pembangunan;
use App\Models\pembayaran;
use App\Models\pendaftarSmpModel;
use App\Models\pendaftarSmkModel;
use App\Models\psg;
use App\Models\semester;
use App\Models\spp;
use App\Models\tunggakan;
use Carbon\Carbon;
use Database\Factories\pendaftarSmpFactory;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table("jurusan")->insert([
            "nama_jurusan" => "Teknik Komputer Jaringan (TKJ)"
        ]);
        
        DB::table("jurusan")->insert([
            "nama_jurusan" => "Teknik Kendaraan Ringan (TKR)"
        ]);
        
        PendaftarSmpModel::factory(10)->create();
        pendaftarSmkModel::factory(10)->create();
        pembayaran::factory(10)->create();
        semester::factory(10)->create();
        spp::factory(10)->create();
        lab::factory(10)->create();
        psg::factory(10)->create();
        tunggakan::factory(10)->create();
        pembangunan::factory(10)->create();
    }
}
