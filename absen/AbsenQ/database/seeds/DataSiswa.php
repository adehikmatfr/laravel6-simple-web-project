<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSiswa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=17;$i<55;$i++){
            DB::table('tbl_siswa')->insert([
                'id_user'=> $i,
                'id_kelas'=> rand(1,4),
                'angkatan'=>'2019-2020',
                'no_me'=>'6281573223411',
                'no_tua'=>'6281573223411'
                ]);   
                 }
    }
}
