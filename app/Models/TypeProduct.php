<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeProduct extends Model
{
    use HasFactory;
    protected $table = 'type_products';
    protected $fillable = ['type'];

    /** RELATIONS */

    public function Poducts(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
