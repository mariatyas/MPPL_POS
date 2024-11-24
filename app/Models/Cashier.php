<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cashier extends Authenticatable
{
    use Notifiable;

    protected $table = 'cashiers';
    protected $primaryKey = 'id_cashiers'; // Primary key
    public $timestamps = true;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
