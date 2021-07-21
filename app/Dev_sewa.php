<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dev_sewa extends Model
{
     protected $connection = 'mysql3';
     protected $table = 'dev_sewa';
     protected $fillable = ['sewa_id','jenis_pelanggan','client_id','client_name','tgl','stdevice_id'];



	 public $timestamps = false;


    public function stdevice()
    {
        return $this->hasMany(St_device::class,'id','stdevice_id')->with('devicename','devicebrand','devicemodel','devicecategory');

    }

}