<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logDB extends Model
{
	protected $connection = 'mysql';
	protected $table = 'logs';
	protected $fillable = ['user_id','ip','id_pelanggan','event','extra'];




	public static function record($user_id = null, $id_pelanggan = null, $event, $extra)
	{
		return static::create([
			'user_id' => is_null($user_id) ? null : $user_id->id,
			'ip' => request()->ip(),
			'id_pelanggan' => is_null($id_pelanggan) ? null : $id_pelanggan,
			'event' => $event,
			'extra' => $extra
		]);
	}

	public function pelanggan()
	{
		return $this->hasMany(Ost_user__cdata::class,'id_pelanggan','id_pelanggan');

	}


}
