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
    if (!Schema::hasTable('barang')) {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('KdBarang')->primary();
            $table->string('NamaBarang');
            $table->integer('Stok');
            $table->unsignedBigInteger('IdKategori');
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
