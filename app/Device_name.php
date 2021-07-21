<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device_name extends Model
{
     protected $connection = 'mysql3';
     protected $table = 'device_name';
     protected $fillable = ['device_name','dev_name','cat_id'];

     
	 public $timestamps = false;

	 public function category()
    {
        return $this->hasMany(Device_category::class,'cat_id','cat_id');

    }
}
