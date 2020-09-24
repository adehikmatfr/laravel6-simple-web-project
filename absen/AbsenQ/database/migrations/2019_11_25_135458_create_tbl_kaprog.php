<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKaprog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kaprog', function (Blueprint $table) {
            $table->increments('id_kaprog');
            $table->integer('id_guru')->unsigned();
            $table->integer('id_jurusan')->unsigned();
            $table->timestamps();

            $table->foreign('id_guru')->references('id_guru')->on('tbl_guru');
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
        Schema::dropIfExists('tbl_kaprog');
    }
}
