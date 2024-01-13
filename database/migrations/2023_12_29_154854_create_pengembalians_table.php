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
        Schema::create('tb_pengembalians', function (Blueprint $table) {
            $table->string('kode_kembali')->primary();
            $table->dateTime('jam_pengembalian');
            $table->decimal('denda', 10, 2)->nullable();
            $table->string('kode_sewa_id');
            $table->timestamps();
            $table->foreign('kode_sewa_id')->references('kode_sewa')->on('tb_penyewaans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pengembalians');
    }
};
