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
        Schema::create('bahanbakus', function (Blueprint $table) {
            $table->id();
            // $table->string('kode_bahan')->unique();
            $table->string('nama_bahan');
            $table->foreignId('id_supplier');
            $table->string('deskripsi');
            $table->integer('stok')->default('0');
            $table->integer('stok_aman')->default('0');
            $table->bigInteger('harga');
            $table->string('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahanbakus');
    }
};
