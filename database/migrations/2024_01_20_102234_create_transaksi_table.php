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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->string('nomor_unik', 10)->unique();
            $table->string('nama_pelanggan');
            $table->integer('qty');
            $table->integer('total_harga');
            $table->integer('bayar');
            $table->integer('kembali');
            $table->enum('status', ['proses', 'selesai', 'diambil'])->default('proses');
            $table->date('tgl_keluar');
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
