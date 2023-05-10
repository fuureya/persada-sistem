<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("lab", function(Blueprint $table){
            $table->id();
            $table->dateTime('tanggal');
            $table->string("kode")->unique()->nullable();
            $table->string("uraian")->nullable();
            $table->integer("penerimaan")->nullable();
            $table->integer("pengeluaran")->nullable();
            $table->integer("saldo")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("lab");
    }
}
