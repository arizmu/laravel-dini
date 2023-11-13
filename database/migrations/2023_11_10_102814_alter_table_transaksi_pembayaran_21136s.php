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
        Schema::table('transaksi_pembayaran_21136s', function (Blueprint $table) {
            $table->date('tanggal_bayar')->nullable()->change();
            $table->date('jatuh_tempo')->nullable()->change();
            $table->string('jumlah_bayar')->nullable()->change();
            $table->boolean('status_bayar')->nullable()->change();
            $table->boolean('validasi_status')->nullable()->change();
            $table->text('file_bukti_bayar')->nullable()->change();
            $table->string('kode_transfer_pembayaran')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_pembayaran_21136s', function (Blueprint $table) {
            $table->date('tanggal_bayar')->change();
            $table->date('jatuh_tempo')->change();
            $table->string('jumlah_bayar')->change();
            $table->boolean('status_bayar')->change();
            $table->boolean('validasi_status')->change();
            $table->text('file_bukti_bayar')->change();
            $table->string('kode_transfer_pembayaran')->change();
        });
    }
};
