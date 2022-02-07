<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SaleDesignProducts extends Model
{
    use HasFactory;
    protected $table = 'sale_design_products';
    protected $fillable = ['type', 'design_content', 'sale_product_id'];

    /** RELATIONS */

    public function SaleProduct(): HasOne
    {
        return $this->hasOne(SaleProduct::class);
    }

}
