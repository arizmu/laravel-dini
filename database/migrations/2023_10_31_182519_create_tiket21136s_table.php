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
        Schema::create('transaksi_21136', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_transaksi', 10)->unique();
            $table->date('tanggal_transaksi');
            $table->string('nama_pelanggan')->nullable();
            $table->string('jumlah_bayar')->nullable();
            $table->string('tanggal_exp')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_21136');
    }
};
