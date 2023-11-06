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
        Schema::create('detail_transaksi_21136', function (Blueprint $table) {
            $table->foreignId('transaksi_21136')->references('id')->on('transaksi_21136')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('tiket_21136_id')->references('id')->on('tiket_21136')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('harga_tiket');
            $table->integer('jumlah_tiket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_21136');
    }
};
