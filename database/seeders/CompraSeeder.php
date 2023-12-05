<?php

namespace Database\Seeders;

use App\Models\Compra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Compra::create([
            'fecha' => '2023-11-30',
            'monto' => '200',
            'proveedor_id' => 1,
        ]);
        Compra::create([
            'fecha' => '2023-12-1',
            'monto' => '400',
            'proveedor_id' => 2,
        ]);
        Compra::create([
            'fecha' => '2023-12-2',
            'monto' => '699',
            'proveedor_id' => 1,
        ]);
    }
}
