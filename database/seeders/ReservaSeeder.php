<?php

namespace Database\Seeders;

use App\Models\Reserva;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reserva::create([
            'fecha' => '2023-11-10',
            'hora_inicio' => '10:00:00',
            'hora_fin' => '11:00:00',
            'estado' => 'No aprobado',
            'servicio_id' => '4',
            'csliente_id' => '2'
        ]);
    }
}
