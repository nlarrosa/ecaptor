<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFormat extends Model
{
    use HasFactory;
    protected $table  =  'product_formats';
    protected $fillable = ['type', 'type_product_id'];



    /** METHOD */
    public static function getByTypeProductId(int $typeProductId): Collection
    {
        $productFormat = ProductFormat::where('type_product_id', $typeProductId)->get();
        return $productFormat;
    }
}
