<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SaleBorderProducts extends Model
{
    use HasFactory;
    protected $table = 'sale_border_products';
    protected $fillable = ['quantity', 'lados', 'type', 'unite_price', 'total_price', 'sale_product_id', 'mts_lineal'];


    /** RELATIONS */

    public function SaleProduct(): HasOne
    {
        return $this->hasOne(SaleProduct::class);
    }
}
