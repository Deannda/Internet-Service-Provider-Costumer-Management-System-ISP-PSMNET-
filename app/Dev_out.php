<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dev_out extends Model
{
     protected $connection = 'mysql3';
     protected $table = 'dev_out';
     protected $fillable = ['client_id','client_name','tgl','out_type','dev_status','dev_mac','dev_serial','dev_mark','dev_type','dev_name','out_id'];

     
	 public $timestamps = false;

}
