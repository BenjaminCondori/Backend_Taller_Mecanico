<?php

namespace Database\Seeders;

use App\Models\VentaProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VentaProducto::create([
            'venta_id' => 1,
            'producto_id' => 1,
            'producto_cantidad' => 3,
            'producto_preciototal' => 1000,
        ]);
        VentaProducto::create([
            'venta_id' => 1,
            'producto_id' => 2,
            'producto_cantidad' => 1,
            'producto_preciototal' => 300,
        ]);
        VentaProducto::create([
            'venta_id' => 1,
            'producto_id' => 4,
            'producto_cantidad' => 2,
            'producto_preciototal' => 200,
        ]);
        VentaProducto::create([
            'venta_id' => 2,
            'producto_id' => 1,
            'producto_cantidad' => 4,
            'producto_preciototal' => 2000,
        ]);
        
        VentaProducto::create([
            'venta_id' => 2,
            'producto_id' => 2,
            'producto_cantidad' => 1,
            'producto_preciototal' => 100,
        ]);
    }
}
