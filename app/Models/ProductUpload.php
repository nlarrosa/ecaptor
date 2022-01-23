<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUpload extends Model
{
    use HasFactory;
    protected $table = 'product_uploads';
    protected $fillable = [
        'category', 
        'line', 
        'desc_line',
        'name_line',
        'name_product',
        'type_transit',
        'type_medida',
        'desc_product',
        'width',
        'height',
        'price',
        'price_suggest',
        'border_include'
    ];
}
