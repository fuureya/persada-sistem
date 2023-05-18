<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Psg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("psg", function(Blueprint $table){
            $table->id();
            $table->dateTime('tanggal');
            $table->string("kode")->unique()->nullable();
            $table->string("uraian")->nullable();
            $table->integer("penerimaan")->nullable();
            $table->integer("pengeluaran")->nullable();
            $table->integer("saldo")->nullable();
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
        Schema::drop("psg");
    }
}
