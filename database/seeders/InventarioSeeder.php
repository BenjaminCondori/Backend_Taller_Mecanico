<?php

namespace Database\Seeders;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = 21;

        for ($i = 1; $i <= $productos; $i++) {
            Inventario::create([
                'stock_disponible' => rand(1, 100),
                'stock_minimo' => rand(1, 20),
            ]);
        }
    }
}
