<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=55;$i<98;$i++){
        DB::table('tbl_guru')->insert([
            'id_user'=> $i
            ]);   
             }
    }
}
