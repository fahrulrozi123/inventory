<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Barang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('id_barang');
            $table->string('nama_barang')->nullable();
            $table->string('deskripsi')->nullable();
            $table->integer('satuan')->nullable();
            $table->string('s_satuan')->nullable();
            $table->integer('stok')->nullable();
            $table->string('s_stok')->nullable();
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
        Schema::dropIfExists('barang');
    }
}
