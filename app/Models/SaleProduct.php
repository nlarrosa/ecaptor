<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;

    protected $table = 'sale_products';
    protected $fillable = ['quantity', 'unit_price', 'total_price', 'product_id', 'sale_id'];

    
}
