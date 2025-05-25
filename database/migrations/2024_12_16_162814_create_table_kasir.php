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
        Schema::create('kasir', function (Blueprint $table) {
            $table->increments('kasir_id'); //menggunakan pelanggan id karena kasir merupakan sistem untuk pelanggan
            $table->string('nama_pelanggan');
            $table->date('tanggal_pemesanan');
            $table->text('pesanan'); // Menggunakan tipe data text untuk fleksibilitas
            $table->integer('jumlah_pesanan');
            $table->decimal('total_harga', 10, 2); // 10 digit total, 2 di belakang koma
            $table->enum('metode_pembayaran', ['Tunai','Transfer','QRIS']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasir');
    }
};
