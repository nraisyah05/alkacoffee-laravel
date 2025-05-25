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
        // Membuat tabel "produk" dengan kolom yang diperlukan
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('produk_id'); // Kolom produk_id sebagai primary key dengan auto increment
            $table->string('nama_produk', 200); // Kolom nama_produk dengan tipe string dan panjang maksimum 200 karakter
            $table->string('gambar', 200); // Kolom gambar_produk dengan tipe string dan panjang maksimum 200 karakter
            $table->string('harga', 200);
            $table->text('keterangan_produk'); // Kolom keterangan_produk dengan tipe text untuk deskripsi panjang
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_produk');
    }
};
