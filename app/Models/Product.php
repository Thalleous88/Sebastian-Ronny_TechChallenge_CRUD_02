<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // nama table/tabelnya yaitu products
    protected $table = 'products';

    // variabel-variabel yang dimiliki oleh table/tabel products yaitu 'name', 'description', 'quantity', 'price', & 'date'
    protected $fillable = ['name', 'description', 'quantity', 'price', 'date'];

}
