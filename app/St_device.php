<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class St_device extends Model
{
     protected $connection = 'mysql3';
     protected $table = 'stdevice';
     protected $fillable = ['id','dev_id','dev_serial','dev_mac','dev_brand','dev_model','cat_id','dev_status'];

     
	 public $timestamps = false;


    public function devicename()
    {
        return $this->hasMany(Device_name::class,'device_name','dev_id');

    }
    public function devicebrand()
    {
        return $this->hasMany(Device_merk::class,'mark_id','dev_brand');

    }
    public function devicemodel()
    {
        return $this->hasMany(Device_type::class,'type_id','dev_model');

    }
    public function devicecategory()
    {
        return $this->hasMany(Device_category::class,'cat_id','cat_id');

    }


}

