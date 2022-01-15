<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDesignProducts extends Model
{
    use HasFactory;
    protected $table = 'sale_design_products';
    protected $fillable = ['type', 'design_content', 'sale_product_id', 'status_sketch_id'];

}
