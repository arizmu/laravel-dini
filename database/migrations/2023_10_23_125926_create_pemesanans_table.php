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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisata_id')->nullable()->references('id')->on('wisatas')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('pelanggan_id')->nullable()->references('id')->on('pelanggans')->cascadeOnUpdate()->nullOnDelete();
            $table->string('jumlah_tiket')->nullable();
            $table->date('tanggal_pemesanana')->nullable();
            $table->string('harga_tiket')->nullable();
            $table->string('total_harga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
