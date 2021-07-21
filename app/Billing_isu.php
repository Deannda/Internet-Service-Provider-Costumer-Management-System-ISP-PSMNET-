<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing_isu extends Model
{
	protected $connection = 'mysql';
	protected $table = 'billing_isu';
	protected $fillable = ['billing_isu'];
}
