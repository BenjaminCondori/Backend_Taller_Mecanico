<?php

namespace Database\Seeders;

use App\Models\Venta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venta::create([
            'fecha' => '2023-11-30',
            'monto' => '200',
            'cliente_id' => 1,
        ]);
        Venta::create([
            'fecha' => '2023-12-1',
            'monto' => '400',
            'cliente_id' => 2,
        ]);
        Venta::create([
            'fecha' => '2023-12-2',
            'monto' => '699',
            'cliente_id' => 1,
        ]);
    }
}
