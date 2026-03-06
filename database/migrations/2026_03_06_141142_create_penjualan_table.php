<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->bigIncrements('penjualan_id');

            $table->unsignedInteger('pelanggan_id')->nullable();

            $table->integer('total_harga');
            $table->string('metode_pembayaran')->nullable();

            $table->timestamps();

            $table->foreign('pelanggan_id')
                ->references('pelanggan_id')
                ->on('pelanggan')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
