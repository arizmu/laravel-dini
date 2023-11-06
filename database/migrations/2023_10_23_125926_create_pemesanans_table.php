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
        Schema::create('tiket_21136', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->string('harga')->nullable();
            $table->integer('kouta_tiket')->nullable();
            $table->date('masa_berlaku')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket_21136');
    }
};
