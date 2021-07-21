<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataLayananPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('data_layanan_pelanggan', function(Blueprint $table){
            $table->increments('id_layanan_pelanggan');
            $table->Integer('id_layanan');
            $table->bigInteger('id_pelanggan');
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
        Schema::dropIfExists('data_layanan_pelanggan');
    }
}
