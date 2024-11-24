<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Gunakan Authenticatable, bukan Model
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    // Secara eksplisit mendefinisikan nama tabel
    protected $table = 'admin'; // Pastikan tabel yang dipakai adalah 'admin'
    
    protected $primaryKey = 'id_admin';

    protected $fillable = ['username', 'password'];

    // Tentukan atribut yang harus disembunyikan (misalnya password)
    protected $hidden = [
        'password',
    ];
}
