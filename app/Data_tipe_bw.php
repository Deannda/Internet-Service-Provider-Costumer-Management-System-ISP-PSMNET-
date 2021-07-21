<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_tipe_bw extends Model
{
    protected $connection = 'mysql';
    protected $table = 'data_tipe_bw';
    protected $fillable = ['tipe_bw'];
}
