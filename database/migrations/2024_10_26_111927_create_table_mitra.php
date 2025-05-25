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
        Schema::create('mitra', function (Blueprint $table) {
            $table->increments('mitra_id');
            $table->string('nama_mitra', 200);
            $table->text('alamat');
            $table->string('email')->unique();
            $table->string('no_tlp', 20)->nullable();
            $table->enum('jenis_mitra', ['Platinum', 'Gold', 'Silver'])->nullable();
            $table->date('tanggal_bergabung', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra');
    }
};
