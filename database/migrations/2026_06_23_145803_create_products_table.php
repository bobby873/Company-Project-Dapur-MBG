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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');          // Nama Menu Makanan (misal: Nasi Ayam Goreng + Sayur)
        $table->integer('total_porsi');  // Jumlah porsi yang dimasak/didistribusikan
        $table->string('image')->nullable(); // Foto makanan (Memenuhi syarat upload file UAS)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
