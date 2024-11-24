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
        Schema::create('reporting', function (Blueprint $table) {
            $table->bigIncrements('id_reporting');          // Primary key
            $table->unsignedBigInteger('id_transaction');   // Foreign key ke tabel transactions
            $table->decimal('total_amount', 10, 2);         // Total nilai transaksi
            $table->string('cashier_name');                 // Nama kasir yang memproses transaksi
            $table->timestamp('transaction_date');          // Tanggal transaksi
            $table->integer('total_items_sold');            // Jumlah barang yang terjual dalam transaksi
            $table->timestamps();
    
            // Relasi ke tabel transactions
            $table->foreign('id_transaction')->references('id_transaction')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporting');
    }
};
