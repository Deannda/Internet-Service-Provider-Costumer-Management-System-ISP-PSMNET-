<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_layanan extends Model
{
    protected $connection = 'mysql';
    protected $table = 'data_layanan';
    protected $fillable = ['nama_layanan','harga_layanan','layanan_prorate'];
}
