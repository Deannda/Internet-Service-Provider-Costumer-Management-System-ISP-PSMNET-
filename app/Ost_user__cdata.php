<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ost_user__cdata extends Model
{
  protected $connection = 'mysql';
  protected $table = 'ost_user__cdata';
  protected $fillable = ['user_id','id_layanan','id_tipe_bw','status_layanan_pelanggan','status_penagihan_layanan','lokasi_layanan','tanggal_aktivasi_layanan','user_id','id_pelanggan','email','name','phone','alamat','notes','datek_layanan','datek_ip_address','datek_cpe','datek_router','datek_switch','datek_indoor_ap','datek_server','datek_kabel','datek_besi','datek_poe','datek_adaptor','datek_ssid_pop','datek_gps_pos','datek_antenna','alamat','tanggal_nonaktif_layanan','alasan_pemutusan','berkas_pemutusan','file_kontrak','hak_khusus','catatan_layanan','penawaran_layanan'];


  public function layanan()
  {
    return $this->hasMany(Data_layanan::class,'id_layanan','id_layanan');

  }

  public function tipebw()
  {
    return $this->hasMany(Data_tipe_bw::class,'id_tipe_bw','id_tipe_bw');

  }

  public function datapelanggan()
  {
    return $this->hasMany(Ost_user::class,'id_pelanggan','id_pelanggan');

  }

  public function devout()
  {
    return $this->hasMany(Dev_out::class,'client_id','user_id');

  }
  public function devsewa()
  {
    return $this->hasMany(Dev_sewa::class,'client_id','user_id')->with('stdevice');

  }

}

