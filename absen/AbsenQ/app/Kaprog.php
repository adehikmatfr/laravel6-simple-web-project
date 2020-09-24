<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kaprog extends Model
{
    protected $table='tbl_kaprog';
    protected $primaryKey='id_kaprog';
    protected $fillable=['id_kaprog','id_guru','id_jurusan'];
}
