<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('eo_id')->nullable();
            $table->integer('rating'); // 1-5 stars
            $table->text('review')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paket_id')->references('id')->on('pakets')->onDelete('cascade');
            $table->foreign('eo_id')->references('id')->on('eos')->onDelete('set null');

            $table->unique(['user_id', 'paket_id']); // One rating per user per package
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
