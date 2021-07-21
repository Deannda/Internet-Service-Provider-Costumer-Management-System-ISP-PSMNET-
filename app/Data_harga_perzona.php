<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_harga_perzona extends Model
{
	protected $connection = 'mysql';
	protected $table = 'data_harga_perzona';
	protected $fillable = ['id_tipe_bw','zona_id','nama_wilayah','harga'];


	public function tipebww()
	{
		return $this->hasMany(Data_tipe_bw::class,'id_tipe_bw','id_tipe_bw');

	}
	public function zona()
	{
		return $this->hasMany(Data_zona::class,'zona_id','zona_id');

	}

}
