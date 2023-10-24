<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Productos',
        ]);

        Categoria::create([
            'nombre' => 'Servicios',
        ]);

        Categoria::create([
            'nombre' => 'Repuestos mecánicos',
            'categoria_id' => '1'
        ]);

        Categoria::create([
            'nombre' => 'Repuestos eléctricos',
            'categoria_id' => '1'
        ]);

        Categoria::create([
            'nombre' => 'Neumaticos',
            'categoria_id' => '1'
        ]);

        Categoria::create([
            'nombre' => 'Lubricantes y fluidos',
            'categoria_id' => '1'
        ]);

        Categoria::create([
            'nombre' => 'Mantenimiento preventivo y correctivo',
            'categoria_id' => '2'
        ]);

        Categoria::create([
            'nombre' => 'Reparación de averías mecánicas',
            'categoria_id' => '2'
        ]);

        Categoria::create([
            'nombre' => 'Reparación de averías eléctricas',
            'categoria_id' => '2'
        ]);

        Categoria::create([
            'nombre' => 'Servicios de Emergencia',
            'categoria_id' => '2'
        ]);
    }
}
