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
    if (!Schema::hasTable('admin')) {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('IdAdmin');
            $table->string('Nama');
            $table->string('Username')->unique();
            $table->string('Password');
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
