<?php

namespace Database\Seeders;

use App\Models\TypeProduct;
use Illuminate\Database\Seeder;

class TypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrTypeProduct = [
            [ 'type' => 'Medida'],
            [ 'type' => 'Estandar'],
        ];

        foreach($arrTypeProduct as $type)
        {
            TypeProduct::create([
                'type' => $type['type']
            ]);
        }
    }
}
