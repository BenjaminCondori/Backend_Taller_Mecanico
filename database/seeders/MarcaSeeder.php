<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            'Toyota',
            'Ford',
            'Honda',
            'Chevrolet',
            'Nissan',
            'Suzuki',
        ];

        foreach ($marcas as $marca) {
            Marca::create(['nombre' => $marca]);
        }
    }
}
