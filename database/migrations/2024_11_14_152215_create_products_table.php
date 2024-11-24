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
            $table->bigIncrements('id_product');   // Primary key
            $table->string('product_name');        // Nama produk
            $table->decimal('price', 10, 2);       // Harga produk
            $table->integer('stock');              // Stok produk
            $table->text('description')->nullable(); // Deskripsi produk
            $table->unsignedBigInteger('id_category'); // Foreign key ke kategori
            $table->timestamps();
    
            // Relasi ke tabel category
            $table->foreign('id_category')->references('id_category')->on('categories');
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
