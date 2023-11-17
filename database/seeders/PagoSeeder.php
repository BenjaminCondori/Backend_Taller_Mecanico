<?php

namespace Database\Seeders;

use App\Models\Pago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pago::create([
            'fecha' => '2023-11-05 10:31:00',
            'monto' => 855,
            'descripcion' => 'Pago de orden de trabajo',
            'factura_id' => 1,
        ]);

        Pago::create([
            'fecha' => '2023-11-15 14:05:17',
            'monto' => 275,
            'descripcion' => 'Pago de orden de trabajo',
            'factura_id' => 2,
        ]);

        Pago::create([
            'fecha' => '2023-11-08 10:30:00',
            'monto' => 170,
            'descripcion' => 'Pago de orden de trabajo',
            'factura_id' => 3,
        ]);

        Pago::create([
            'fecha' => '2023-11-17 13:45:20',
            'monto' => 120,
            'descripcion' => 'Pago de orden de trabajo',
            'factura_id' => 4,
        ]);

        Pago::create([
            'fecha' => '2023-11-20 15:15:10',
            'monto' => 170,
            'descripcion' => 'Pago de orden de trabajo',
            'factura_id' => 5,
        ]);

        Pago::create([
            'fecha' => '2023-11-08 11:37:00',
            'monto' => 654.5,
            'descripcion' => 'Pago de orden de trabajo',
            'factura_id' => 6,
        ]);
    }
}
