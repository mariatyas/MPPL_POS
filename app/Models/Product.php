<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Pastikan nama tabel benar

    protected $primaryKey = 'id_product'; // Menentukan primary key jika tidak default

    protected $fillable = [
        'product_name',
        'price',
        'stock',
        'id_category',
        'description',
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    // Relasi ke transaksi item
    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class, 'id_product');
    }
}
