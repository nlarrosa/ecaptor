<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusUsers;

class StatusUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrStatususer = [ 
            ['name' => 'Activo',      'color' => 'success'],
            ['name' => 'suspendido',  'color' => 'warning'],
            ['name' => 'desactivado', 'color' => 'danger'],
        ];

        foreach($arrStatususer as $status)
        {
            StatusUsers::create([
                'name'  => $status['name'],
                'color' => $status['color'],
            ]);
        }
    }
}
