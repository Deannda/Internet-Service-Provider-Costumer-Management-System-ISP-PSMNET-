<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ost_user_email extends Model
{
     protected $connection = 'mysql2';
     protected $table = 'ost_user_email';

     protected $fillable = ['user_id', 'address'];

	 public $timestamps = false;

}
