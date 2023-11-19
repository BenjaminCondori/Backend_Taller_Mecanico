<?php

namespace Database\Seeders;

use App\Models\CotizacionServicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CotizacionServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CotizacionServicio::create([
            'servicio_cantidad' => 1,
            'servicio_preciototal' => 40,
            'cotizacion_id' => 1,
            'servicio_id' => 3,
        ]);

        CotizacionServicio::create([
            'servicio_cantidad' => 1,
            'servicio_preciototal' => 50,
            'cotizacion_id' => 1,
            'servicio_id' => 16,
        ]);

        CotizacionServicio::create([
            'servicio_cantidad' => 1,
            'servicio_preciototal' => 250,
            'cotizacion_id' => 2,
            'servicio_id' => 13,
        ]);


        CotizacionServicio::create([
            'servicio_cantidad' => 1,
            'servicio_preciototal' => 40,
            'cotizacion_id' => 3,
            'servicio_id' => 3,
        ]);

        CotizacionServicio::create([
            'servicio_cantidad' => 1,
            'servicio_preciototal' => 130,
            'cotizacion_id' => 3,
            'servicio_id' => 15,
        ]);

        CotizacionServicio::create([
            'servicio_cantidad' => 1,
            'servicio_preciototal' => 40,
            'cotizacion_id' => 4,
            'servicio_id' => 3,
        ]);

        CotizacionServicio::create([
            'servicio_cantidad' => 1,
            'servicio_preciototal' => 80,
            'cotizacion_id' => 4,
            'servicio_id' => 2,
        ]);

        CotizacionServicio::create([
            'servicio_cantidad' => 1,
            'servicio_preciototal' => 30,
            'cotizacion_id' => 5,
            'servicio_id' => 12,
        ]);

        CotizacionServicio::create([
            'servicio_cantidad' => 1,
            'servicio_preciototal' => 80,
            'cotizacion_id' => 6,
            'servicio_id' => 2,
        ]);

        CotizacionServicio::create([
            'servicio_cantidad' => 1,
            'servicio_preciototal' => 50,
            'cotizacion_id' => 6,
            'servicio_id' => 1,
        ]);
    }
}
