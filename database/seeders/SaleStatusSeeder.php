<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SaleStatus;

class SaleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrStatus = [
            [ 'name' => 'Nuevo',       'color' => 'primary' ],
            [ 'name' => 'Preparacion', 'color' => 'warning' ],
            [ 'name' => 'Produccion',  'color' => 'info' ],
            [ 'name' => 'Finalizado',  'color' => 'success' ],
            [ 'name' => 'Anulado',     'color' => 'danger' ],
            [ 'name' => 'Modificar',   'color' => 'secondary' ],
        ];

        
        foreach($arrStatus as $status)
        {
            SaleStatus::create([
                'name'  => $status['name'],
                'color' => $status['color'],
            ]);
        }


    }
}
