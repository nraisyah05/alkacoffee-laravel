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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('penjualan_id'); // Primary Key
            $table->dateTime('tanggal_jual');
            $table->json('produk_list'); // JSON untuk daftar produk
            $table->json('jumlah_list'); // JSON untuk jumlah tiap produk
            $table->integer('total_harga');
            $table->enum('metode_pembayaran', ['QRIS', 'Transfer', 'Cash']);// Untuk pembayaran
            $table->text('catatan')->nullable(); // Bisa kosong
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
