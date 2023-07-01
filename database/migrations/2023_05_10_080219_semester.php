<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Semester extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->string("kode")->unique()->nullable();
            $table->string("uraian")->nullable();
            $table->bigInteger("penerimaan")->nullable();
            $table->bigInteger("pengeluaran")->nullable();
            $table->dateTime("updated_at")->nullable();
            $table->dateTime("created_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("semester");
    }
}
