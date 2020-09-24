<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kelas', function (Blueprint $table) {
            $table->increments('id_kelas');
            $table->string('nama_kelas');
            $table->integer('id_jurusan')->unsigned();
            $table->integer('urutan');
            $table->timestamps();

            $table->foreign('id_jurusan')->references('id_jurusan')->on('tbl_jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kelas');
    }
}
