<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaction';

    protected $fillable = ['total_amount', 'payment_amount', 'change_amount', 'cashier_id'];

    // Relasi ke kasir
    public function cashier()
    {
        return $this->belongsTo(Cashier::class, 'cashier_id');
    }

    // Relasi ke transaksi item
    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class, 'id_transaction');
    }
}
