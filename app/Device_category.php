<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device_category extends Model
{
     protected $connection = 'mysql3';
     protected $table = 'device_cat';
     protected $fillable = ['cat_id','device_cat'];

     
	 public $timestamps = false;
}
