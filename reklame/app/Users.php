<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model 
{
    protected $table='user';
    protected $primaryKey='id_user';
    protected $fillable=['id_user','username','password','nama_user','level','token'];
    protected $hidden=['password'];
}
