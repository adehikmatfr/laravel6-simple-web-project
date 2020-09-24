<?php

use Illuminate\Database\Seeder;

class WaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('tbl_guru')->insert([
                'id_guru'=> 28,
                'id_kelas'=>2
                ]);   
    }
}
