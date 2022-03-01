<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusSketch extends Model
{
    use HasFactory;
    protected $table = 'status_sketch';
    protected $fillable = ['name', 'color'];

    /** RELATIONS */

    public function SaleSketchProducts(): HasMany
    {
        return $this->hasMany(SaleSketchProducts::class);
    }


    // public function SaleProducts(): HasMany
    // {
    //     return $this->hasMany(SaleProduct::class);
    // }
    
}
