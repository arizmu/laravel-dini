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
        Schema::create('tiket_detail_21136', function (Blueprint $table) {
            $table->foreignId('tiket_21136_id')->references('id')->on('tiket_21136')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('wisata_21136_id')->references('id')->on('wisata_21136')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer("jumlah_tiket");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket_detail_21136');
    }
};
