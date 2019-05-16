<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_eo');
            $table->string('gambar_paket');
            $table->string('nama_paket');
            $table->string('kategori');
            $table->string('available');
            $table->text('deskripsi');
            $table->bigInteger('harga_paket');
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
        Schema::dropIfExists('pakets');
    }
}
