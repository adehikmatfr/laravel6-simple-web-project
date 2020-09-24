<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblWali extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_wali', function (Blueprint $table) {
            $table->increments('id_wali');
            $table->integer('id_guru')->unsigned();
            $table->integer('id_kelas')->unsigned();
            $table->timestamps();

            $table->foreign('id_guru')->references('id_guru')->on('tbl_guru');
            $table->foreign('id_kelas')->references('id_kelas')->on('tbl_kelas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_wali');
    }
}
