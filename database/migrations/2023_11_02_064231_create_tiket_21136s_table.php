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
        Schema::create('transaksi_pembayaran_21136s', function (Blueprint $table) {
            $table->unsignedBigInteger('transaksi_21136_id');
            $table->string('kode_pembayaran', 10)->nullable()->default(null);
            $table->date('tanggal_bayar');
            $table->date('jatuh_tempo');
            $table->string('jumlah_bayar');
            $table->boolean('status_bayar');
            $table->boolean('validasi_status');
            $table->text('file_bukti_bayar');
            $table->string('kode_transfer_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pembayaran_21136s');
    }
};
