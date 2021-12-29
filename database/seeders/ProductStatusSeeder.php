<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductStatus;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrStatusProduct = [
            [ 'name' => 'Stock', 'color' => 'success'],
            [ 'name' => 'Sin Stock', 'color' => 'danger'],
        ];

        
        foreach( $arrStatusProduct as $status)
        {
            ProductStatus::create([
                'name' => $status['name'],
                'color' => $status['color'],
            ]);
        }
    }
}
