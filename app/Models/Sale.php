<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $fillable = ['user_id', 'sale_status_id', 'responsability'];


    /** RELATIONS */

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    

    public function SaleProducts(): HasMany
    {
        return $this->hasMany(SaleProduct::class);
    }


    public function SaleStatus(): BelongsTo
    {
        return $this->belongsTo(SaleStatus::class);
    }


    /** METHODS */
    public static function saleStatusToUpdate(int $saleId): void
    {
        $sale = Sale::findOrfail($saleId);
        $sale->sale_status_id = $sale->sale_status_id  + 1;
        $sale->update();
    }
}
