<?php

namespace Database\Seeders;

use Carbon\Carbon;
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

       DB::table("pendaftar_smk")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "jurusans_id" => 1,
        "asal_sekolah" => "Smk laniang",
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008"
       ]);
       DB::table("pendaftar_smk")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "jurusans_id" => 2,
        "asal_sekolah" => "Smk laniang",
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008"
       ]);


       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);
       DB::table("pendaftar_smp")->insert([
        "nama_pendaftar" => "Dave Grohl",
        "asal_sekolah" => "Smk laniang",
        "tanggal_lahir" => Carbon::now(),
        "nomor_wa" => "085757882739",
        "nama_wali" => "subaji",
        "nomor_wa_wali" => "08998540008",
        "tanggal_daftar" => Carbon::now()
       ]);

       




    }
}
