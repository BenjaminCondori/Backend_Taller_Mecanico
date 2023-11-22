<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empleado::create([
            'ci' => '223344',
            'nombre' => 'Benjamin',
            'apellido' => 'Condori Vasquez',
            'genero' => 'M',
            'telefono' => '66774412',
            'direccion' => 'Calle 1',
            'usuario_id' => '1',
            'puesto_id' => '1',
        ]);

        Empleado::create([
            'ci' => '447788',
            'nombre' => 'Cesar Alejandro',
            'apellido' => 'Caballero Caballero',
            'genero' => 'M',
            'telefono' => '67845422',
            'direccion' => 'Calle 2',
            'usuario_id' => '2',
            'puesto_id' => '3',
        ]);

        Empleado::create([
            'ci' => '556677',
            'nombre' => 'Maria',
            'apellido' => 'Perez Soliz',
            'genero' => 'F',
            'telefono' => '77889966',
            'direccion' => 'Calle 3',
            'usuario_id' => '7',
            'puesto_id' => '2',
        ]);

        Empleado::create([
            'ci' => '889900',
            'nombre' => 'Carla',
            'apellido' => 'Gomez Perez',
            'genero' => 'F',
            'telefono' => '66554112',
            'direccion' => 'Calle 4',
            'usuario_id' => '8',
            'puesto_id' => '2',
        ]);

        Empleado::create([
            'ci' => '118833',
            'nombre' => 'Juan Carlos',
            'apellido' => 'Gutierrez Flores',
            'genero' => 'M',
            'telefono' => '66884413',
            'direccion' => 'Calle 5',
            'usuario_id' => '9',
            'puesto_id' => '3',
        ]);

        Empleado::create([
            'ci' => '226675',
            'nombre' => 'Santiago',
            'apellido' => 'Roca Soliz',
            'genero' => 'M',
            'telefono' => '77281166',
            'direccion' => 'Calle 6',
            'usuario_id' => '10',
            'puesto_id' => '3',
        ]);
    }
}
