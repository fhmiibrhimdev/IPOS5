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
        Schema::create('grup_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->text('kode');
            $table->text('grup');
            $table->text('potongan');
            $table->text('level_harga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grup_pelanggan');
    }
};
