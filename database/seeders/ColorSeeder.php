<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrColors = [
            [ 'name' => "Violeta",         'code' => "1" ],
            [ 'name' => "Blanco",          'code' => "2" ],
            [ 'name' => "Fucsia",          'code' => "3" ],
            [ 'name' => "Marron",          'code' => "4" ],
            [ 'name' => "Rojo",            'code' => "5" ],
            [ 'name' => "Amarillo",        'code' => "6" ],
            [ 'name' => "Beige",           'code' => "7" ],
            [ 'name' => "Gris",            'code' => "8" ],
            [ 'name' => "Naranja",         'code' => "9" ],
            [ 'name' => "Rosa",            'code' => "10" ],
            [ 'name' => "Azul Claro",      'code' => "11" ],
            [ 'name' => "Bordo",           'code' => "12" ],
            [ 'name' => "Gris Oscuro",     'code' => "13" ],
            [ 'name' => "Negro",           'code' => "14" ],
            [ 'name' => "Verde Agua",      'code' => "15" ],
            [ 'name' => "Azul Marino",     'code' => "16" ],
            [ 'name' => "Celeste",         'code' => "17" ],
            [ 'name' => "Ladrillo",        'code' => "18" ],
            [ 'name' => "Oro",             'code' => "19" ],
            [ 'name' => "Verde Brillante", 'code' => "20" ],
            [ 'name' => "Azul Francia",    'code' => "21" ],
            [ 'name' => "Crema",           'code' => "22" ],
            [ 'name' => "Limon",           'code' => "23" ],
            [ 'name' => "Plata",           'code' => "24" ],
            [ 'name' => "Verde Menta",     'code' => "25" ],
            [ 'name' => "Verde Oscuro",    'code' => "26" ],
            [ 'name' => "Verde Petroleo",  'code' => "27" ],
        ];


        foreach($arrColors as $data)
        {
            Color::create([
                'name' => $data['name'],
                'code' => $data['code'],
            ]);
        }
    }
}
