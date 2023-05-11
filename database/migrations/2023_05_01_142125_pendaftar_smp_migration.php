<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
class PendaftarSmpMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('pendaftar_smp', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pendaftar');
            $table->string('asal_sekolah');
            $table->dateTime('tanggal_lahir');
            $table->string("nomor_wa");
            $table->string("nama_wali");
            $table->string("nomor_wa_wali");
            $table->string("status")->nullable();
            $table->dateTime("tanggal_daftar")->nullable();
            $table->dateTime("tanggal_update")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftar_smp');
    }
}
