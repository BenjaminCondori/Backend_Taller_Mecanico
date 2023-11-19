<?php

namespace Database\Seeders;

use App\Models\Factura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Factura::create([
            'fecha_emision' => '2023-11-05 10:31:00',
            'detalle' => 'Orden de trabajo',
            'importe' => 900,
            'saldo' => 45,
            'monto_total' => 855,
        ]);

        Factura::create([
            'fecha_emision' => '2023-11-15 14:05:17',
            'detalle' => 'Orden de trabajo',
            'importe' => 300,
            'saldo' => 25,
            'monto_total' => 275,
        ]);

        // Factura::create([
        //     'fecha_emision' => '2023-11-08 10:30:00',
        //     'detalle' => 'Orden de trabajo',
        //     'importe' => 200,
        //     'saldo' => 30,
        //     'monto_total' => 170,
        // ]);

        Factura::create([
            'fecha_emision' => '2023-11-17 13:45:20',
            'detalle' => 'Orden de trabajo',
            'importe' => 120,
            'saldo' => 0,
            'monto_total' => 120,
        ]);

        Factura::create([
            'fecha_emision' => '2023-11-20 15:15:10',
            'detalle' => 'Orden de trabajo',
            'importe' => 180,
            'saldo' => 10,
            'monto_total' => 170,
        ]);

        Factura::create([
            'fecha_emision' => '2023-11-08 11:37:00',
            'detalle' => 'Orden de trabajo',
            'importe' => 700,
            'saldo' => 45.5,
            'monto_total' => 654.5,
        ]);
    }
}
