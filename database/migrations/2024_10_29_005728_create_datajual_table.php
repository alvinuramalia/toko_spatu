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
        Schema::create('datajual', function (Blueprint $table) {
            $table->id();
            $table->string('costumer');
            $table->integer('produk_id');
            $table->integer('jumlah');
            $table->integer('total_jumlah');
            $table->integer('sales_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datajual');
    }
};
