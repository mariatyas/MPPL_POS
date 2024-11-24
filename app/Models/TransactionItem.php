<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaction_items';

    protected $fillable = ['id_transaction', 'id_product', 'quantity', 'price_at', 'price_total'];

    // Relasi ke transaksi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction');
    }

    // Relasi ke produk
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
