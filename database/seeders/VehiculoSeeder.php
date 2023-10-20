<?php

namespace Database\Seeders;

use App\Models\Vehiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehiculo::create([
            'placa' => 'ABC123',
            'nro_chasis' => '123456789',
            'año' => 2010,
            'color' => 'Rojo',
            'tipo_vehiculo_id' => 1,
            'marca_id' => 1,
            'modelo_id' => 1,
            'cliente_id' => 1,
        ]);

        Vehiculo::create([
            'placa' => 'ABC321',
            'nro_chasis' => '1234567455',
            'año' => 2008,
            'color' => 'Blanco',
            'tipo_vehiculo_id' => 1,
            'marca_id' => 1,
            'modelo_id' => 2,
            'cliente_id' => 1,
        ]);

        Vehiculo::create([
            'placa' => 'XYZ321',
            'nro_chasis' => '11477554677',
            'año' => 2015,
            'color' => 'Azul',
            'tipo_vehiculo_id' => 1,
            'marca_id' => 1,
            'modelo_id' => 2,
            'cliente_id' => 2,
        ]);

        Vehiculo::create([
            'placa' => 'XYZ547',
            'nro_chasis' => '41254866334',
            'año' => 2012,
            'color' => 'Negro',
            'tipo_vehiculo_id' => 2,
            'marca_id' => 2,
            'modelo_id' => 1,
            'cliente_id' => 3,
        ]);

        Vehiculo::create([
            'placa' => 'ERA794',
            'nro_chasis' => '4647876213',
            'año' => 2012,
            'color' => 'Negro',
            'tipo_vehiculo_id' => 2,
            'marca_id' => 2,
            'modelo_id' => 2,
            'cliente_id' => 3,
        ]);

        Vehiculo::create([
            'placa' => 'LXW123',
            'nro_chasis' => '471555674656',
            'año' => 2017,
            'color' => 'Negro',
            'tipo_vehiculo_id' => 2,
            'marca_id' => 3,
            'modelo_id' => 2,
            'cliente_id' => 4,
        ]);
    }
}
