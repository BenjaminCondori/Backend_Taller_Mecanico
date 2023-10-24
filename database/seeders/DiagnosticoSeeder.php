<?php

namespace Database\Seeders;

use App\Models\Diagnostico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiagnosticoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diagnosticos = [
            [
                'descripcion' => 'Descripción del diagnóstico 1',
                'recomendaciones' => 'Recomendaciones para el diagnóstico 1',
                'fecha' => '2023-09-30',
                'vehiculo_id' => 1,
            ],
            [
                'descripcion' => 'Descripción del diagnóstico 2',
                'recomendaciones' => 'Recomendaciones para el diagnóstico 2',
                'fecha' => '2023-09-29',
                'vehiculo_id' => 2,
            ],
            [
                'descripcion' => 'Descripción del diagnóstico 3',
                'recomendaciones' => 'Recomendaciones para el diagnóstico 3',
                'fecha' => '2023-09-29',
                'vehiculo_id' => 2,
            ],
            [
                'descripcion' => 'Descripción del diagnóstico 4',
                'recomendaciones' => 'Recomendaciones para el diagnóstico 4',
                'fecha' => '2023-09-29',
                'vehiculo_id' => 2,
            ],
            // Añade más diagnósticos según sea necesario
        ];

        foreach ($diagnosticos as $diagnostico) {
            Diagnostico::create($diagnostico);
        }
    }
}
