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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->text('kode');
            $table->text('nama_barang');
            $table->text('id_jenis');
            $table->text('id_satuan');
            $table->text('barcode');
            $table->text('harga_pokok');
            $table->text('harga_jual');
            $table->text('stok')->default('0');
            $table->text('stok_minimum');
            $table->text('id_supplier');
            $table->text('keterangan');
            $table->enum('status_jual', ['Masih dijual', 'Tidak dijual']);
            $table->text('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
