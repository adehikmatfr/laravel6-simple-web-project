<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('id_ID');
        for($i=1; $i<45; $i++){
     User::create([
     'username'=> str_random(3),
     'nama' => $faker->name,
     'password' => bcrypt('user'),
     'jenis_kelamin'=>'laki-laki',
     'alamat'=>$faker->address,
     'id_jabatan'=>4
     ]);   
        }
    }
}
