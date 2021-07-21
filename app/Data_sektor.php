<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_sektor extends Model
{
    protected $connection = 'mysql';
    protected $table = 'data_sektor';
    protected $fillable = ['nama_sektor'];
}
