<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_pop extends Model
{
      protected $connection = 'mysql';
    protected $table = 'data_pop';
    protected $fillable = ['nama_pop'];
}
