<?php

use Illuminate\Database\Seeder;

class TblJurusan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Kelas::create([
            'nama_kelas'=>str_random(5),
            'id_jurusan'=>1,
            'urutan'=>1
        ]);

      
        
    }
}
