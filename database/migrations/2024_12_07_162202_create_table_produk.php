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
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('produk_id'); // Primary Key
            $table->string('nama_produk', 100);
            $table->text('deskripsi')->nullable();
            $table->enum('kategori', ['Makanan', 'Minuman', 'Other'])->nullable();
            $table->decimal('harga', 15, 2);
            $table->unsignedInteger('stok')->default(0); // Tidak boleh negatif, default 0
            $table->binary('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
