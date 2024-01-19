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
        Schema::create('persediaan', function (Blueprint $table) {
            $table->id();
            $table->text('tanggal');
            $table->text('id_barang');
            $table->text('qty');
            $table->text('deskripsi');
            $table->text('buku')->default('-');
            $table->text('fisik')->default('-');
            $table->text('perbedaan')->default('-');
            $table->text('opname')->default('no');
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persediaan');
    }
};
