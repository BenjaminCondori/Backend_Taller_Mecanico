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
            'fecha' => '2023-11-23',
            'hora_inicio' => '10:00:00',
            'hora_fin' => '10:29:59',
            'estado' => 'Aprobado',
            'servicio_id' => '1',
            'cliente_id' => '2',
            'empleado_id' => '1'
        ]);
        Reserva::create([
            'fecha' => '2023-11-23',
            'hora_inicio' => '10:30:00',
            'hora_fin' => '11:59:59',
            'estado' => 'Aprobado',
            'servicio_id' => '3',
            'cliente_id' => '3',
            'empleado_id' => '1'
        ]);
        Reserva::create([
            'fecha' => '2023-11-23',
            'hora_inicio' => '14:00:00',
            'hora_fin' => '14:29:59',
            'estado' => 'Aprobado',
            'servicio_id' => '1',
            'cliente_id' => '4',
            'empleado_id' => '1'
        ]);
        Reserva::create([
            'fecha' => '2023-11-24',
            'hora_inicio' => '14:00:00',
            'hora_fin' => '14:29:59',
            'estado' => 'Aprobado',
            'servicio_id' => '1',
            'cliente_id' => '2',
            'empleado_id' => '1'
        ]);
        Reserva::create([
            'fecha' => '2023-11-23',
            'hora_inicio' => '14:30:00',
            'hora_fin' => '14:59:59',
            'estado' => 'Aprobado',
            'servicio_id' => '1',
            'cliente_id' => '1',
            'empleado_id' => '1'
        ]);
    }
}
