<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_siswa', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->integer('id_user')->unsigned();
            $table->integer('id_kelas')->unsigned();
            $table->string('angkatan');
            $table->string('no_me');
            $table->string('no_tua');
            $table->timestamps();

            $table->foreign('id_kelas')->references('id_kelas')->on('tbl_kelas');
            $table->foreign('id_user')->references('id_user')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_siswa');
    }
}
