<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleColorProducts extends Model
{
    use HasFactory;
    protected $table = 'sale_color_products';
    protected $fillable = ['color_id', 'sector', 'sale_product_id'];

    /** RELATIONS */

    public function SaleProduct(): BelongsTo
    {
        return $this->belongsTo(SaleProduct::class);
    }


    public function Color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
