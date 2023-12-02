<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detallecompra = [
            [
                'id' => 1,
                'cantidad' => 1,
                'precio' => 100.00,
                'importe' => 100.00, // 'importe' => '100.00
                'nota_compra_id' => 1,
                'producto_id' => 1,
            ],
        ];
        foreach ($detallecompra as $detallecompra) {
            \App\Models\DetalleCompra::create($detallecompra);
        }
    }
}
