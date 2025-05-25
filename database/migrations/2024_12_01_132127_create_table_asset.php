<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('asset', function (Blueprint $table) {
            $table->increments('asset_id');
            $table->string('nama_asset', 100);
            $table->enum('kategori', ['Mesin', 'Alat', 'Inventaris'])->nullable();
            $table->date('tanggal_pembelian')->nullable();
            $table->date('tanggal_kadaluarsa')->nullable();
            $table->enum('status', ['Aktif', 'Kadaluarsa', 'Maintenance'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset');
    }
};
