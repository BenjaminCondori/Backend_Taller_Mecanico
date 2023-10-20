<?php

namespace Database\Seeders;

use App\Models\Modelo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelos = [
            ['nombre' => 'Camry', 'marca_id' => 1],
            ['nombre' => 'Corolla', 'marca_id' => 1],
            ['nombre' => 'Rav4', 'marca_id' => 1],
            ['nombre' => 'F-150', 'marca_id' => 2],
            ['nombre' => 'Mustang', 'marca_id' => 2],
            ['nombre' => 'Explorer', 'marca_id' => 2],
            ['nombre' => 'Civic', 'marca_id' => 3],
            ['nombre' => 'Accord', 'marca_id' => 3],
            ['nombre' => 'CR-V', 'marca_id' => 3],
            ['nombre' => 'Camaro', 'marca_id' => 4],
            ['nombre' => 'Equinox', 'marca_id' => 4],
            ['nombre' => 'Silverado', 'marca_id' => 4],
            ['nombre' => 'Altima', 'marca_id' => 5],
            ['nombre' => 'Rogue', 'marca_id' => 5],
            ['nombre' => 'Sentra', 'marca_id' => 5],
            ['nombre' => 'Swift', 'marca_id' => 6],
            ['nombre' => 'Vitara', 'marca_id' => 6],
            ['nombre' => 'Jimny', 'marca_id' => 6],
        ];

        foreach ($modelos as $modelo) {
            Modelo::create($modelo);
        }





    }
}
