<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->dateTime("tanggal_bayar");
            $table->string("nama_siswa");
            $table->integer("nis");
            $table->string("kelas");
            $table->integer("uang_pembangunan")->nullable();
            $table->integer("uang_spp")->nullable();
            $table->integer("uang_lab")->nullable();
            $table->integer("semester_ganjil")->nullable();
            $table->integer("semester_genap")->nullable();
            $table->integer("uang_psg")->nullable();
            $table->integer("uang_uas")->nullable();
            $table->integer("tunggakan")->nullable();
            $table->integer("keterangan")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("pembayaran");
    }
}
