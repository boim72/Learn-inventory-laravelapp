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
        Schema::create('barangins', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->string('kode_barang')->references('kode_barang')->on('barangs');
            // $table->string('nama_supplier');
            $table->integer('jumlah_masuk');
            $table->integer('harga_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangins');
    }
};
