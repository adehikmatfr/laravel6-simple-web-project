<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    protected $table='tbl_wali';
    protected $primaryKey='id_wali';
    protected $fillable=['id_wali','id_guru','id_kelas'];
}
