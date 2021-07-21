<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('data_pelanggan', function(Blueprint $table){
            $table->bigInteger('id_pelanggan')->primary();
            $table->text('nama_pelanggan');
            $table->bigInteger('nik');
            $table->text('alamat_ktp');
            $table->text('alamat_instansi');
            $table->text('alamat_penagihan');
            $table->bigInteger('no_hp');
            $table->text('email');
            $table->Integer('tipe_pengguna')->unsigned();
            $table->Integer('kategori_pelanggan')->unsigned();
            $table->Integer('nama_sektor')->unsigned();
            $table->Integer('layanan')->unsigned();
            $table->Integer('pop')->unsigned();
            $table->text('status');
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pelanggan');
    }
}
