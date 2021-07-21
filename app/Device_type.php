<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device_type extends Model
{
     protected $connection = 'mysql3';
     protected $table = 'dev_type';
     protected $fillable = ['type_id','tipe','id_name','id_mark'];

     
	 public $timestamps = false;

	 public function devname()
     {
        return $this->hasMany(Device_name::class,'device_name','id_name');

     }
     public function devmerk()
     {
        return $this->hasMany(Device_merk::class,'mark_id','id_mark');

     }
}
