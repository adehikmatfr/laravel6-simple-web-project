<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table='tbl_absen';
    protected $primaryKey='id_absen';
    protected $fillabel=['id_absen','id_siswa','masuk','keluar','keterangan','photo','waktu'];
}
