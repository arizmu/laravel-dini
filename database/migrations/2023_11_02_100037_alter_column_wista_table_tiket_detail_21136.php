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
        Schema::table('tiket_detail_21136', function (Blueprint $table) {
            $table->renameColumn('wisata_21136_id', 'wisata_21136');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tiket_detail_21136', function (Blueprint $table) {
            $table->renameColumn('wisata_21136', 'wisata_21136_id');
        });
    }
};
