<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// =========================================================================
// MIGRASI TABEL BARANG
// Membuat tabel "barang" untuk menyimpan data inventory barang.
// =========================================================================

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('kode_barang', 50)->unique();
            $table->string('nama_barang', 150);
            $table->string('kategori', 100)->nullable();
            $table->string('satuan', 50)->nullable();           // pcs, kg, liter, dll
            $table->integer('stok')->default(0);
            $table->integer('stok_minimum')->default(0);

            $table->string('lokasi_penyimpanan', 100)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
