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
        Schema::create('barangouts', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_keluar');
            $table->string('kode_barang');
            // $table->foreignId('id_supplier');
            $table->integer('jumlah_keluar');
            $table->integer('harga_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangouts');
    }
};
