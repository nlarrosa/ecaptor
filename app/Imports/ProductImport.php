<?php

namespace App\Imports;

use App\Models\ProductUpload;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row)
        {
            ProductUpload::create([
                'category'      => $row[0],
                'line'          => $row[1],
                'name_line'     => $row[2],
                'desc_line'     => $row[3],
                'name_product'  => $row[4],
                'type_transit'  => $row[5],
                'type_medida'   => $row[6],
                'desc_product'  => $row[7],
                'width'         => $row[8],
                'height'        => $row[9],
                'price'         => $row[10],
                'price_suggest' => $row[11],
            ]);
        }
    }
}
