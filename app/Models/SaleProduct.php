<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SaleProduct extends Model
{
    use HasFactory;

    protected $table = 'sale_products';
    protected $fillable = ['quantity', 'unit_price', 'total_price', 'product_id', 'sale_id', 'format', 'width', 'height'];


    /** RELATIONS */

    public function Sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }


    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }


    public function SaleBorderProduct(): HasOne
    {
        return $this->hasOne(SaleBorderProducts::class);
    }


    public function SaleDesignProduct(): HasOne
    {
        return $this->hasOne(SaleDesignProducts::class);
    }


    public function saleColorProducts(): HasMany
    {
        return $this->hasMany(SaleColorProducts::class);
    }


    public function SaleSketch(): HasOne
    {
        return $this->hasOne(SaleSketchProducts::class);
    }


    public function saleSketchProduct(): HasMany
    {
        return $this->hasMany(SaleSketchProducts::class);
    }

    
}
