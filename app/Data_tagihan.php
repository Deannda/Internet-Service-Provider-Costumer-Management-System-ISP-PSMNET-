<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_tagihan extends Model
{
    protected $connection = 'mysql';
    protected $table = 'data_tagihan';
    protected $fillable = ['id_pelanggan','user_id','tanggal_tagihan','status_tagihan','alasan_suspend'];
	
	protected $primaryKey = 'id_tagihan';


    public function layanan()
	{
		return $this->hasMany(Ost_user__cdata::class,'user_id','user_id')->with('layanan');

	}

    public function pelanggan()
	{
		return $this->hasMany(Data_pelanggan::class,'id_pelanggan','id_pelanggan')->with('datalayanan');

	}
}
