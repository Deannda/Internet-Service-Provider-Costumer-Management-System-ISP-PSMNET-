<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SomeModel extends Model
{
     protected $connection = 'mysql2';
     protected $table = 'ost_user__cdata';

    public function ost_user()
	{
		return $this->hasMany(Ost_user::class,'default_email_id','user_id');

	}

}
