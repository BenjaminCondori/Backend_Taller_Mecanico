<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create([
            'nombre' => 'Taller de Reparación ABC',
            'telefono' => '12345678',
            'email' => 'tallerabc@example.com',
            'direccion' => '123 Calle Principal, Ciudad',
        ]);

        Proveedor::create([
            'nombre' => 'Autopartes XYZ',
            'telefono' => '78765432',
            'email' => 'autopartesxyz@example.com',
            'direccion' => '456 Calle Secundaria, Otra Ciudad',
        ]);

        Proveedor::create([
            'nombre' => 'Distribuidora de Lubricantes S.A.',
            'telefono' => '74585655',
            'email' => 'lubricantes@example.com',
            'direccion' => '789 Calle Comercial, Otra Ciudad',
        ]);

        Proveedor::create([
            'nombre' => 'Taller Mecánico Rápido',
            'telefono' => '77178297',
            'email' => 'tallerrapido@example.com',
            'direccion' => '321 Calle Terciaria, Alguna Ciudad',
        ]);

        Proveedor::create([
            'nombre' => 'Proveedor de Neumáticos ABC',
            'telefono' => '87256189',
            'email' => 'proveedorneumaticos@example.com',
            'direccion' => '555 Avenida Principal, Otra Ciudad',
        ]);
    }
}
