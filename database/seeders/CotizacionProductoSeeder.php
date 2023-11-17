<?php

namespace Database\Seeders;

use App\Models\CotizacionProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CotizacionProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CotizacionProducto::create([
            'producto_cantidad' => 3,
            'producto_preciototal' => 480,
            'cotizacion_id' => 1,
            'producto_id' => 3,
        ]);

        CotizacionProducto::create([
            'producto_cantidad' => 1,
            'producto_preciototal' => 100,
            'cotizacion_id' => 1,
            'producto_id' => 5,
        ]);

        CotizacionProducto::create([
            'producto_cantidad' => 2,
            'producto_preciototal' => 280,
            'cotizacion_id' => 1,
            'producto_id' => 2,
        ]);


        CotizacionProducto::create([
            'producto_cantidad' => 1,
            'producto_preciototal' => 25,
            'cotizacion_id' => 2,
            'producto_id' => 4,
        ]);

        CotizacionProducto::create([
            'producto_cantidad' => 2,
            'producto_preciototal' => 20,
            'cotizacion_id' => 5,
            'producto_id' => 7,
        ]);

        CotizacionProducto::create([
            'producto_cantidad' => 1,
            'producto_preciototal' => 120,
            'cotizacion_id' => 5,
            'producto_id' => 8,
        ]);

        CotizacionProducto::create([
            'producto_cantidad' => 4,
            'producto_preciototal' => 640,
            'cotizacion_id' => 6,
            'producto_id' => 3,
        ]);
    }
}
