<?php

namespace Database\Seeders;

use App\Models\lab;
use App\Models\pembayaran;
use App\Models\pendaftarSmpModel;
use App\Models\pendaftarSmkModel;
use App\Models\semester;
use App\Models\spp;
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
        
        PendaftarSmpModel::factory(40)->create();
        pendaftarSmkModel::factory(40)->create();
        pembayaran::factory(40)->create();
        semester::factory(40)->create();
        spp::factory(40)->create();
        lab::factory(40)->create();
    }
}
