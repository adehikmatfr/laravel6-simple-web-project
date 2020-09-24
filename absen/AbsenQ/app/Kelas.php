<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table='tbl_kelas';
    protected $primaryKey='id_kelas';
    protected $fillable=['id_kelas','nama_kelas','id_jurusan','urutan'];
}
