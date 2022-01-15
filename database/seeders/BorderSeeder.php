<?php

namespace Database\Seeders;

use App\Models\Border;
use Illuminate\Database\Seeder;

class BorderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrBorder = [
            [ 'name' => config('ecaptor.border.tipos.antitropiezo'), 'price' => 1.5 ],
            [ 'name' => config('ecaptor.border.tipos.termofundido'), 'price' => 0 ],
            [ 'name' => config('ecaptor.border.tipos.sinborde'),     'price' => 0 ],
        ];

        foreach($arrBorder as $border)
        {
            Border::create([
                'name' => $border['name'],
                'price' => $border['price']
            ]);
        }
    }
}
