<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotaCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notacompra = [
            [
                'id' => 1,
                'fecha' => '2021-08-01',
                'hora' => '12:00:00',
                'total' => 100.00,
                'proveedor_id' => 1,
                'empleado_id' => 1,
            ],
        ];
        foreach ($notacompra as $notacompra) {
            \App\Models\NotaCompra::create($notacompra);
        }
    }
}
