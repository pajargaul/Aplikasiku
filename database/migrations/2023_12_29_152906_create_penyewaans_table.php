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
        Schema::create('tb_penyewaans', function (Blueprint $table) {
            $table->string('kode_sewa')->primary();
            $table->integer('jumlah_sewa');
            $table->integer('jumlah_waktu');
            $table->dateTime('jam_sewa')->nullable();
            $table->dateTime('jam_pengembalian')->nullable();
            $table->string('foto_sebelum')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('kode_barang_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kode_barang_id')->references('kode_barang')->on('tb_barangsewas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_penyewaans');
    }
};
