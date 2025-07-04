<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->id('IdManager'); // Sesuai model
            $table->string('Nama');
            $table->string('Username')->unique();
            $table->string('Password');
            // Jika tidak pakai created_at & updated_at:
            // $table->timestamps(); ← hapus kalau model pakai `public $timestamps = false;`
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manager');
    }
};

