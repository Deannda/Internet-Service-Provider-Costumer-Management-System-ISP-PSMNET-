<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device_merk extends Model
{
     protected $connection = 'mysql3';
     protected $table = 'dev_mark';
     protected $fillable = ['mark_id','merk'];

     
	 public $timestamps = false;
}
