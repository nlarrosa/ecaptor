<?php

namespace Database\Seeders;

use App\Models\ProductFormat;
use Illuminate\Database\Seeder;

class ProductFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrFormats = [
            [ 'type' => 'APAISADO',    'typeProduct' => 2],
            [ 'type' => 'CAMINO',      'typeProduct' => 2],
            [ 'type' => 'REDONDO',     'typeProduct' => 1],
            [ 'type' => 'ASIMETRICO',  'typeProduct' => 1],
        ];


        foreach($arrFormats as $format)
        {
            ProductFormat::create([
                'type' => $format['type'],
                'type_product_id' => $format['typeProduct'],
            ]);
        }
    }
}
