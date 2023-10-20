<?php

namespace Database\Seeders;

use App\Models\TipoVehiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Automóvil'],
            ['nombre' => 'Camión'],
            ['nombre' => 'Motocicleta'],
            ['nombre' => 'Autobús'],
            ['nombre' => 'Tractor'],
            ['nombre' => 'Trailer'],
        ];

        foreach ($tipos as $tipo) {
            TipoVehiculo::create($tipo);
        }
    }
}
