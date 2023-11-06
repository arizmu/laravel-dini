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
        Schema::create('keranjang_tiket_21136', function (Blueprint $table) {
            $table->foreignId('tiket_21136_id')->references('id')->on('tiket_21136')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('jumlah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang_tiket_21136');
    }
};
