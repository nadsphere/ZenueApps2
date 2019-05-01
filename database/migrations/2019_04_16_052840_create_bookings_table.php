<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pemesan_id');
            $table->bigInteger('renter_id');
            $table->string('jenis_layanan');
            $table->text('lokasi');
            $table->text('konsep_acara');
            $table->text('deskripsi_acara');
            $table->bigInteger('jumlah_tamu');
            $table->dateTime('tanggal_acara');
            $table->text('informasi')->nullable();
            $table->integer('is_accepted')->default('0');
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
        Schema::dropIfExists('bookings');
    }
}
