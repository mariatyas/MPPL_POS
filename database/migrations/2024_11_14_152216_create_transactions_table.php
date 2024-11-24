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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id_transaction');  // Primary key
            $table->decimal('total_amount', 10, 2);   // Total nilai transaksi
            $table->decimal('payment_amount', 10, 2); // Jumlah uang yang dibayar
            $table->decimal('change_amount', 10, 2);  // Jumlah kembalian
            $table->unsignedBigInteger('cashier_id'); // Foreign key ke tabel cashiers
            $table->timestamps();
    
            // Relasi ke tabel cashiers
            $table->foreign('cashier_id')->references('id_cashiers')->on('cashiers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
