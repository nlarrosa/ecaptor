<?php

namespace Database\Seeders;

use App\Models\StatusSketch;
use Illuminate\Database\Seeder;

class StatusSketchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrStatusSketch = [
            [ 'name' => config('ecaptor.sketchStatus.status.sinenviar'), 'color' => 'primary'],
            [ 'name' => config('ecaptor.sketchStatus.status.enviado'),   'color' => 'warning'],
            [ 'name' => config('ecaptor.sketchStatus.status.aprobado'),  'color' => 'success'],
            [ 'name' => config('ecaptor.sketchStatus.status.modificar'), 'color' => 'secondary'],
            [ 'name' => config('ecaptor.sketchStatus.status.anulado'),   'color' => 'danger'],
        ];


        foreach($arrStatusSketch as $status)
        {
            StatusSketch::create([
                'name'  => $status['name'],
                'color' => $status['color'],
            ]);
        }
    }
}
