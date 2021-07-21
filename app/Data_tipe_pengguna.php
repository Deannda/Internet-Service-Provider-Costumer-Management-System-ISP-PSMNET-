<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_tipe_pengguna extends Model
{
    protected $table = 'data_tipe_pengguna';
    protected $fillable = ['tipe_pengguna'];
}
