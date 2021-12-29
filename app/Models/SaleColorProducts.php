<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleColorProducts extends Model
{
    use HasFactory;
    protected $table = 'sale_color_products';
    protected $fillable = ['color_id', 'sector', 'sale_product_id'];
}
