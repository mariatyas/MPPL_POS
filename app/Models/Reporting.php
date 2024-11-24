<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporting extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_reporting';

    protected $fillable = ['id_transaction', 'total_amount', 'cashier_name', 'transaction_date', 'total_items_sold'];

    // Relasi ke transaksi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction');
    }
}
