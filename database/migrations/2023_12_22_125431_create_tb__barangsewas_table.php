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
        Schema::create('tb_barangsewas', function (Blueprint $table) {
            $table->string('kode_barang')->primary();
            $table->string('nama_barang');
            $table->decimal('harga', 10, 2);
            $table->string('kondisi');
            $table->integer('jumlah');
            $table->string('foto_barang');
            $table->unsignedBigInteger('nelayan_id');
            $table->timestamps();
            $table->foreign('nelayan_id')->references('id')->on('nelayans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_barangsewas');
    }
};
