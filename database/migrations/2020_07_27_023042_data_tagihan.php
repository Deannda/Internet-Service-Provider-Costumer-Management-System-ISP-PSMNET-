<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataTagihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('data_tagihan', function(Blueprint $table){
            $table->increments('id_tagihan')->primarykey();
            $table->Integer('id_pelanggan')->unsigned();
            $table->Integer('id_layanan')->unsigned();
            $table->date('tanggal_tagihan');
            $table->Integer('status_tagihan');
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
        Schema::dropIfExists('data_tagihan');
    }
}
