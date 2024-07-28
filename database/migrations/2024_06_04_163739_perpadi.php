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
        Schema::create('perpadi', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->unsignedBigInteger('penggilingan_id');
            $table->decimal('harga_gabah', 10, 2)->nullable();
            $table->decimal('stok_gabah', 10, 2)->nullable();
            $table->decimal('harga_beras', 10, 2)->nullable();
            $table->decimal('stok_beras', 10, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpadi');
    }
};
