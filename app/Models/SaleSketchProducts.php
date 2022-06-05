<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SaleSketchProducts extends Model
{
    use HasFactory;

    protected $table = 'sale_sketch_products';
    protected $fillable = ['file_name', 'sale_product_id', 'status_sketch_id'];



    /** RELATIONS */
    public function StatusSketch(): BelongsTo
    {
        return $this->belongsTo(StatusSketch::class);
    }

    public function SaleProducts(): BelongsTo
    {
        return $this->belongsTo(SaleProduct::class);
    }

    // public function SaleProducts(): HasOne
    // {
    //     return $this->hasOne(SaleProduct::class);
    // }




    
    /** METHODS */

    public static function getStatusBySaleProductId(int $saleProductId): array
    {
        $sketchStatus = SaleSketchProducts::where('sale_product_id', $saleProductId)->first();

        if(!$sketchStatus)
        {
            $arrSketchStatus = [
                'statusName' => config('ecaptor.sketchStatus.status.sinenviar'),
                'statusId'   => config('ecaptor.sketchStatus.id.sinenviar'),
                'statusColor' => 'primary',
            ];
        } else {

            $arrSketchStatus = [
                'statusName'  => $sketchStatus->name,
                'statusId'    => $sketchStatus->status_sketch_id,
                'statusColor' => $sketchStatus->color,
            ];
        }

        return $arrSketchStatus;
    }
}
