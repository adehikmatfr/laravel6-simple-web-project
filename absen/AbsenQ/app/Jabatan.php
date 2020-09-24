<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    //
    protected $table='tbl_jabatan';
    protected $primaryKey='id_jabatan';
    protected $fillable=['nama_jabatan','id_jabatan'];

    
}
