<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAbsen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_absen', function (Blueprint $table) {
            $table->increments('id_absen');
            $table->integer('id_siswa')->unsigned();
            $table->datetime('masuk');
            $table->datetime('keluar');
            $table->string('keterangan');
            $table->string('photo');
            $table->timestamps();

            $table->foreign('id_siswa')->references('id_siswa')->on('tbl_siswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_absen');
    }
}
