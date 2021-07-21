<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_zona extends Model
{
    protected $connection = 'mysql';
    protected $table = 'data_zona';
    protected $fillable = ['nama_wilayah'];
}
