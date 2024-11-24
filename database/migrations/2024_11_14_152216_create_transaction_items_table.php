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
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->bigIncrements('id_transaction_items');  // Primary key
            $table->unsignedBigInteger('id_transaction');   // Foreign key ke transactions
            $table->unsignedBigInteger('id_product');       // Foreign key ke products
            $table->integer('quantity');                    // Jumlah produk yang dibeli
            $table->decimal('price', 10, 2);                // Harga satuan produk
             $table->timestamps();

            // Relasi ke tabel transactions dan products
            $table->foreign('id_transaction')->references('id_transaction')->on('transactions');
            $table->foreign('id_product')->references('id_product')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_items');
    }
};
