<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrRols = [
            ['type' => 'Administrador',  'abbreviation' => 'ADMIN', 'color' => 'secondary'],
            ['type' => 'Proveedor',      'abbreviation' => 'PROV',  'color' => 'primary'],
            ['type' => 'Cliente',        'abbreviation' => 'CLI',   'color' => 'warning'],
            ['type' => 'Productor',      'abbreviation' => 'PROD',  'color' => 'success'],
        ];

        foreach($arrRols as $rol)
        {
            Rol::create([
                'type'         => $rol['type'],
                'abbreviation' => $rol['abbreviation'],
                'color'        => $rol['color'],
            ]);
        }
    }
}
