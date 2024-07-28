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
        Schema::create('lpm', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->decimal('harga_gabah', 10, 2)->nullable();
            $table->decimal('stok_gabah', 10, 2)->nullable();
            $table->decimal('harga_beras', 10, 2)->nullable();
            $table->decimal('stok_beras', 10, 2)->nullable();
            $table->unsignedBigInteger('lumbung_id');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lpm');
    }
};
