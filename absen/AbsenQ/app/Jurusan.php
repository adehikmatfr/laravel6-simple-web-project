<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    //
    protected $table='tbl_jurusan';
    protected $primaryKey='id_jurusan';
    protected $fillable=['nama_jurusan','id_jurusan'];
}
