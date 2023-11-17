<?php

namespace Database\Seeders;

use App\Models\Cotizacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CotizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cotizacion::create([
            'fecha' => '2023-11-16 22:00:08',
            'precio' => 950,
            'descripcion' => 'Cotizacion de prueba',
            'cliente_id' => 1,
            'empleado_id' => 1,
            'vehiculo_id' => 1,
        ]);

        Cotizacion::create([
            'fecha' => '2023-11-16 22:00:08',
            'precio' => 275,
            'descripcion' => 'Descipción de la cotización',
            'cliente_id' => 1,
            'empleado_id' => 3,
            'vehiculo_id' => 2,
        ]);

        Cotizacion::create([
            'fecha' => '2023-11-16 22:00:08',
            'precio' => 170,
            'descripcion' => 'Descipción de la cotización',
            'cliente_id' => 2,
            'empleado_id' => 1,
            'vehiculo_id' => 3,
        ]);

        Cotizacion::create([
            'fecha' => '2023-11-16 22:00:08',
            'precio' => 120,
            'descripcion' => 'Descipción de la cotización',
            'cliente_id' => 3,
            'empleado_id' => 3,
            'vehiculo_id' => 4,
        ]);

        Cotizacion::create([
            'fecha' => '2023-11-16 22:00:08',
            'precio' => 170,
            'descripcion' => 'Descipción de la cotización',
            'cliente_id' => 3,
            'empleado_id' => 1,
            'vehiculo_id' => 5,
        ]);

        Cotizacion::create([
            'fecha' => '2023-11-16 22:00:08',
            'precio' => 770,
            'descripcion' => 'Descipción de la cotización',
            'cliente_id' => 4,
            'empleado_id' => 1,
            'vehiculo_id' => 6,
        ]);
    }
}
