<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name', 'width', 'height', 'price', 'price_suggest', 'details', 'stock', 'line_id', 'type_product_id'];



    /** RELATIONS */
    public function TypeProduct(): BelongsTo
    {
        return $this->belongsTo(TypeProduct::class);
    }



    /**  METHODS */ 
    
    public static function getProductCustomizeByLineId(int $lineId): Product
    {
        $product =  Product::where('line_id', $lineId)
        ->where('type_product_id', config('ecaptor.product.type.medida'))
        ->first();

        return $product;
    }
}
