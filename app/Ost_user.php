<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ost_user extends Model
{
    //
     protected $connection = 'mysql';
     protected $table = 'ost_user';

     protected $fillable = ['org_id','default_email_id','name','id_pelanggan','no_hp','email','alamat_ktp','nik','alamat_instansi','alamat_penagihan','tipe_pengguna','kategori_pelanggan','nama_sektor','status_pelanggan','foto_ktp'];


     const CREATED_AT = 'created';
     const UPDATED_AT = 'updated';

     public function tipepengguna()
	{
		return $this->hasMany(Data_tipe_pengguna::class,'id_tipe_pengguna','tipe_pengguna');

	}
	public function kategoripelanggan()
	{
		return $this->hasMany(Data_kategori::class,'id_kategori','kategori_pelanggan');

	}
	public function datasektor()
	{
		return $this->hasMany(Data_sektor::class,'id_sektor','nama_sektor');

	}
	public function datalayanan()
	{
		return $this->hasMany(Ost_user__cdata::class,'id_pelanggan','id_pelanggan')->with('layanan');

	}
	public function datapop()
	{
		return $this->hasMany(Data_pop::class,'id_pop','pop');

	}


}
