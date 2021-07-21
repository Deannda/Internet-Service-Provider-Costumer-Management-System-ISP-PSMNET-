<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_kategori extends Model
{
    protected $connection = 'mysql';
    protected $table = 'data_kategori';
    protected $fillable = ['nama_kategori'];
}
