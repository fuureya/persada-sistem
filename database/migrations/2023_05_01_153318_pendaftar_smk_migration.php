<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendaftarSmkMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_smk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pendaftar');
            $table->foreignId('jurusans_id');
            $table->string('asal_sekolah');
            $table->dateTime('tanggal_lahir')->nullable();
            $table->string("nomor_wa");
            $table->string("nama_wali");
            $table->string("nomor_wa_wali");
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
        Schema::dropIfExists('pendaftar_smk');
    }
}
