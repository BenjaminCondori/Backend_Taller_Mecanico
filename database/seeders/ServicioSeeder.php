<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicio::create([
            'nombre' => 'Cambio de aceite y filtros',
            'descripcion' => 'Incluye el cambio de aceite del motor y los filtros de aceite y aire.',
            'precio' => 50.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Alineación y balanceo',
            'descripcion' => 'Alineación y balanceo de ruedas para mejorar la estabilidad y el desgaste de los neumáticos.',
            'precio' => 80.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Revisión de frenos',
            'descripcion' => 'Inspección completa del sistema de frenos para garantizar un funcionamiento seguro.',
            'precio' => 40.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Revisión de suspensión',
            'descripcion' => 'Inspección y ajuste de la suspensión del vehículo para mejorar la comodidad y el control.',
            'precio' => 60.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Revisión del sistema eléctrico',
            'descripcion' => 'Diagnóstico y reparación de problemas eléctricos en el vehículo.',
            'precio' => 70.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Revisión del sistema de aire acondicionado',
            'descripcion' => 'Mantenimiento y recarga del sistema de aire acondicionado.',
            'precio' => 55.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Revisión del sistema de combustible',
            'descripcion' => 'Inspección y limpieza del sistema de combustible para un rendimiento óptimo.',
            'precio' => 65.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Revisión del sistema de escape',
            'descripcion' => 'Inspección y reparación del sistema de escape para reducir emisiones y ruidos.',
            'precio' => 45.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Revisión del sistema de transmisión',
            'descripcion' => 'Diagnóstico y reparación de problemas en la transmisión del vehículo.',
            'precio' => 75.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Revisión del sistema de dirección',
            'descripcion' => 'Inspección y ajuste de la dirección del vehículo para un manejo seguro.',
            'precio' => 55.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Revisión del sistema de frenos',
            'descripcion' => 'Inspección completa del sistema de frenos para garantizar un funcionamiento seguro.',
            'precio' => 40.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Revisión del sistema de seguridad',
            'descripcion' => 'Inspección de los componentes de seguridad del vehículo, como cinturones y airbags.',
            'precio' => 30.00,
            'categoria_id' => 7,
        ]);

        Servicio::create([
            'nombre' => 'Reparación de motores',
            'descripcion' => 'Reparación y reconstrucción de motores de vehículos.',
            'precio' => 250.00,
            'categoria_id' => 8,
        ]);

        Servicio::create([
            'nombre' => 'Reparación de transmisión',
            'descripcion' => 'Reparación y mantenimiento de la transmisión del vehículo.',
            'precio' => 110.00,
            'categoria_id' => 8,
        ]);

        Servicio::create([
            'nombre' => 'Reparación de frenos',
            'descripcion' => 'Reparación y sustitución de componentes del sistema de frenos.',
            'precio' => 130.00,
            'categoria_id' => 8,
        ]);

        Servicio::create([
            'nombre' => 'Reparación de suspensión',
            'descripcion' => 'Reparación y ajuste de la suspensión del vehículo.',
            'precio' => 50.00,
            'categoria_id' => 8,
        ]);

        Servicio::create([
            'nombre' => 'Reparación de dirección',
            'descripcion' => 'Reparación y mantenimiento de la dirección del vehículo.',
            'precio' => 65.00,
            'categoria_id' => 8,
        ]);

        Servicio::create([
            'nombre' => 'Reparación del sistema eléctrico',
            'descripcion' => 'Diagnóstico y reparación de problemas eléctricos en el vehículo.',
            'precio' => 100.00,
            'categoria_id' => 8,
        ]);

        Servicio::create([
            'nombre' => 'Reparación del sistema de aire acondicionado',
            'descripcion' => 'Reparación y mantenimiento del sistema de aire acondicionado.',
            'precio' => 60.00,
            'categoria_id' => 8,
        ]);

        Servicio::create([
            'nombre' => 'Reparación del sistema de combustible',
            'descripcion' => 'Reparación y limpieza del sistema de combustible para un rendimiento óptimo.',
            'precio' => 80.00,
            'categoria_id' => 8,
        ]);

        Servicio::create([
            'nombre' => 'Reparación del sistema de escape',
            'descripcion' => 'Reparación y mantenimiento del sistema de escape del vehículo.',
            'precio' => 80.00,
            'categoria_id' => 8,
        ]);
    }
}
