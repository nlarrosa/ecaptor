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
                'category'       => $row[0],
                'line'           => $row[1],
                'name_line'      => $row[2],
                'desc_line'      => $row[3],
                'name_product'   => $row[4],
                'border_include' => $row[5],
                'type_transit'   => $row[6],
                'type_medida'    => $row[7],
                'desc_product'   => $row[8],
                'width'          => $row[9],
                'height'         => $row[10],
                'price'          => $row[11],
                'price_suggest'  => $row[12],
            ]);
        }
    }
}
