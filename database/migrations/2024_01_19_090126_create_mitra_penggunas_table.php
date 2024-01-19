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
        Schema::create('mitra_pengguna', function (Blueprint $table) {
            $table->id();
            $table->text('kode');
            $table->text('nama_lengkap');
            $table->text('alamat');
            $table->text('kota');
            $table->text('provinsi');
            $table->text('negara');
            $table->text('kode_pos');
            $table->text('telepon');
            $table->text('fax');
            $table->text('email');
            $table->text('kontak');
            $table->text('no_rek');
            $table->text('rek_an');
            $table->text('bank');
            $table->text('npwp');
            $table->text('keterangan');
            $table->enum('role', ['Supplier', 'Pelanggan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra_pengguna');
    }
};
