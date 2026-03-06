<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {

            $table->bigIncrements('detail_id');

            $table->unsignedBigInteger('penjualan_id');
            $table->unsignedInteger('produk_id'); // ⬅️ ini penting

            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subtotal');

            $table->timestamps();

            $table->foreign('penjualan_id')
                ->references('penjualan_id')
                ->on('penjualan')
                ->onDelete('cascade');

            $table->foreign('produk_id')
                ->references('produk_id')
                ->on('produk')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
