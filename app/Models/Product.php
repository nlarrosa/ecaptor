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


    public function Line(): BelongsTo
    {
        return $this->belongsTo(Line::class);
    }



    /**  METHODS */ 
    
    public static function getProductCustomizeByLineId(int $lineId): Collection
    {
        $product =  Product::where('line_id', $lineId)
        ->where('type_product_id', config('ecaptor.product.type.medida'))
        ->get();

        return $product;
    }


    public static function getPriceProductByMtsCuadrardo(float $mtsCuadrado, int $productId): float
    {
        $product = Product::findOrFail($productId);
        $price   = $mtsCuadrado * $product->price;

        return round($price, 2);
        
    }



    public static function getMtsCuadradoByProduct(float $width, float $height): float
    {
        $width  = $width / 100;
        $height = $height / 100;
        $mtsCuadrado = $width * $height;

        return $mtsCuadrado;
    }
}
