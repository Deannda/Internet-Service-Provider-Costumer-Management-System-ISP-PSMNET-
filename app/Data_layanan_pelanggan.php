<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_layanan_pelanggan extends Model
{
    protected $table = 'data_layanan_pelanggan';
    protected $fillable = ['id_layanan','id_pelanggan','status_pelanggan','status_layanan','status_layanan_pelanggan','status_penagihan_layanan','tanggal_aktivasi_layanan'];

    public function layanan()
    {
        return $this->hasMany(Data_layanan::class,'id_layanan','id_layanan');

    }
    public function datapelanggan()
    {
        return $this->hasMany(Data_pelanggan::class,'id_pelanggan','id_pelanggan');

    }
}
