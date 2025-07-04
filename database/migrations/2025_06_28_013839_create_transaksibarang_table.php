<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksibarang', function (Blueprint $table) {
            $table->id('IdTransaksi');
            $table->integer('Jumlah');
            $table->string('Status');
            $table->date('Tanggal');
            $table->string('KdBarang');
            $table->unsignedBigInteger('IdAdmin');

            // Foreign keys (optional tapi disarankan)
            // $table->foreign('KdBarang')->references('KdBarang')->on('barang');
            // $table->foreign('IdAdmin')->references('IdAdmin')->on('admin');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('transaksibarang');
    }
};
