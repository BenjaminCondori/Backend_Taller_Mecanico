<?php

namespace Database\Seeders;

use App\Models\CompraProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompraProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompraProducto::create([
            'compra_id' => 1,
            'producto_id' => 1,
            'producto_cantidad' => 3,
            'producto_preciototal' => 1000,
        ]);
        CompraProducto::create([
            'compra_id' => 1,
            'producto_id' => 2,
            'producto_cantidad' => 1,
            'producto_preciototal' => 300,
        ]);
        CompraProducto::create([
            'compra_id' => 1,
            'producto_id' => 4,
            'producto_cantidad' => 2,
            'producto_preciototal' => 200,
        ]);
        CompraProducto::create([
            'compra_id' => 2,
            'producto_id' => 1,
            'producto_cantidad' => 4,
            'producto_preciototal' => 2000,
        ]);
        CompraProducto::create([
            'compra_id' => 2,
            'producto_id' => 2,
            'producto_cantidad' => 1,
            'producto_preciototal' => 100,
        ]);
    }
}
